<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payslip; // Ensure the model is imported
use App\Models\PermissionRoleModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PayslipController extends Controller
{
    // Upload payslip
    public function upload(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'payslip' => 'required|file|mimes:pdf',
            'payslip_date' => 'required|date',
        ]);

        $path = $request->file('payslip')->store('payslip', 'public');

        Payslip::create([
            'user_id' => $request->user_id,
            'file_path' => $path,
            'payslip_date' => $request->payslip_date,
        ]);

        return redirect()->back()->with('success', 'Payslip uploaded successfully!');
    }

    // See all users' payslips (admin view)
    public function adminPayslips()
    {
        $PermissionRole = PermissionRoleModel::getPermission('Upload PaySlip',Auth::user()->role_id);
        if(empty($PermissionRole))
        {
            return view('error.401');
        }

        // Get unique user IDs from payslips
        $payslips = Payslip::select('user_id')->distinct()->with('user')->get();

        return view('payslips.admin', compact('payslips'));
    }

    public function getPayslipsByDate(Request $request)
    {
        $payslip = Payslip::where('user_id', $request->user_id)
                        ->where('payslip_date', $request->payslip_date)
                        ->first();

        if ($payslip) {
            // Only return the relative file path (without 'storage/')
            return response()->json(['file_path' => $payslip->file_path]);
        }

        return response()->json(['error' => 'Payslip not found'], 404);
    }

    public function userPayslip(Request $request)
    {
        $PermissionRole = PermissionRoleModel::getPermission('PaySlip', Auth::user()->role_id);
        if (empty($PermissionRole)) {
            return view('error.401');
        }
    
        // Get logged-in user info
        $user = Auth::user();
        
        // Get available payslip dates for this user
        $dates = Payslip::where('user_id', Auth::id())
            ->select('payslip_date')
            ->distinct()
            ->get();
    
        $payslipFile = null;
    
        // If a date is selected, try to load the corresponding payslip
        if ($request->has('payslipDate')) {
            $payslip = Payslip::where('user_id', Auth::id())
                ->where('payslip_date', $request->input('payslipDate'))
                ->first();
    
            if ($payslip && file_exists(storage_path('app/public/' . $payslip->file_path))) {
                $payslipFile = asset('public/storage/' . $payslip->file_path);
            }
        }
    
        return view('payslips.user', compact('user','dates', 'payslipFile'));
    }    

}
