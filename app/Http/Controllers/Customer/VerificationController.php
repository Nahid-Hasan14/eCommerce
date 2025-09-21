<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class VerificationController extends Controller
{
    public function verify($token)
    {
        $customer = Customer::where('enable_token', $token)->first();


        if (!$customer) {
            return redirect('/login')->with('error', 'Invalid or expired verification link.');
        }
        if ($customer->enabled) {
            return redirect('/login')->with('status', 'Your account is already verified. Please login.');
        }

        $customer->update([
            'enabled' => true,
            'enable_token' => null
        ]);
        // dd($customer);

        \Auth::guard('customer')->login($customer);

        return redirect()->route('customer.home')->with('success', 'Your account has been verified successfully!');
    }
}
