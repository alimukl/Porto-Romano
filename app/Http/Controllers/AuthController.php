<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Log; // Make sure to include this at the top
use Hash;

class AuthController extends Controller
{
    public function login()
    {
        //dd(Hash::make(123456));
        if(!empty(Auth::check()))
        {
            return redirect('panel/dashboard');
        }
        return view ('auth.login');
    }

    public function auth_login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Store user ID and password in session
            session([
                'mfa_user_id' => $user->id,
                'mfa_password' => $request->password, // Temporarily store password
                'remember_me' => $request->has('remember') // Store remember me option
            ]);
            
            // Redirect to send MFA code before login
            return $this->sendMfaCode($request);
        } else {
            return redirect()->back()->with('error', "Please enter correct email and password");
        }
    }

    public function sendMfaCode(Request $request)
    {
        // Retrieve user ID from session
        $userId = session('mfa_user_id');
    
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Please log in first.');
        }
    
        // Get the user from database
        $user = User::find($userId);
    
        if (!$user) {
            return redirect()->route('login')->with('error', 'User not found.');
        }
    
        // Generate 6-digit OTP
        $otp = rand(100000, 999999);
    
        // Store OTP in database with expiry time (e.g., 5 minutes)
        $updateSuccess = $user->update([
            'mfa_token' => $otp,
            'mfa_expires_at' => Carbon::now()->addMinutes(5)
        ]);
    
        // If the database update fails, return an error and do NOT send the email
        if (!$updateSuccess) {
            return redirect()->route('login')->with('error', 'Failed to generate MFA code. Please try again.');
        }
    
        try {
            // Send OTP via email
            Mail::send('emails.mfa', ['otp' => $otp,'user' => $user], function ($message) use ($user) {
                $message->to($user->email)->subject('Your MFA Verification Code');
            });
    
        } catch (\Exception $e) {
            // If email fails, log the error and show a message
            \Log::error('MFA email sending failed: ' . $e->getMessage());
            return redirect()->route('login')->with('error', 'Failed to send MFA code. Please try again.');
        }
    
        return view('auth.mfa'); // Redirect to MFA verification page
    }    

    public function verifyMfaCode(Request $request)
    {
        // Combine the OTP array into a single string
        $otp = implode('', $request->otp);

        // Validate OTP as a 6-digit numeric string
        $request->merge(['otp' => $otp]); // Convert to string for validation

        $request->validate([
            'otp' => ['required', 'digits:6'],
        ]);

        $userId = session('mfa_user_id');
        $remember = session('remember_me', false); // Retrieve remember me preference

        if (!$userId) {
            return redirect()->route('login')->with('error', 'Session expired. Please log in again.');
        }

        $user = User::find($userId);

        if (!$user || 
            is_null($user->mfa_token) || 
            is_null($user->mfa_expires_at) || 
            now()->gt($user->mfa_expires_at) || 
            $user->mfa_token !== $request->otp) 
        {
            return redirect()->route('verify.mfa')->withErrors(['otp' => 'Invalid or expired verification code.']);
        }

        // Clear MFA token after successful verification
        $user->update(['mfa_token' => null, 'mfa_expires_at' => null]);

        // Authenticate user without using stored password
        Auth::login($user, $remember);

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Authentication failed.');
        }

        // Clear session MFA data
        session()->forget(['mfa_user_id', 'mfa_password', 'remember_me']);

        return redirect('panel/dashboard');
    }


    public function logout()
    {
        session()->forget('mfa_user_id'); // Remove MFA session
        Auth::logout();

        return redirect(url(''));
    }
}
