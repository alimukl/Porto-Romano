<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payslip; // Ensure the model is imported

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

    public function viewPayslip($userId, $payslipDate)
    {
        $payslip = Payslip::where('user_id', $userId)
                        ->where('payslip_date', $payslipDate)
                        ->first();

        if ($payslip && file_exists(storage_path('app/public/' . $payslip->file_path))) {
            return response()->file(storage_path('app/public/' . $payslip->file_path));
        }

        return redirect()->back()->with('error', 'Payslip not found.');
    }

}
