<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('subscription', compact('user'));
    }

    public function store(Request $request, User $user)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 50000,
            ),
            'customer_detail' => array(
                'first_name' => Auth::user()->First_Name,
                'last_name' => Auth::user()->Last_Name,
                'email' => Auth::user()->email,
                'phone' => Auth::user()->phone,
            ),
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $subscription = Subscription::create([
            'users_id' => Auth::id(),
            'subscription_duration' => Carbon::now()->addMonth(),
            'subscription_start_date' => Carbon::now(),
            'subscription_end_date' => Carbon::now()->addMonth(),
            'subscription_status' => 'active',
            'snap_token' => $snapToken,
            'payment_status' => 'pending',
        ]);    

        $user->update([
            'subscription' => true,            
        ]);

        return view('subscription', compact('user', 'subscription'));
    }
    
    public function success(Request $request, Subscription $subscription)
    {
        $subscription->update([
            'payment_status' => 'success',
        ]);

        // $request->session()->forget('successSub');
        // $request->session()->put('successSub', 'Successfully subscribed to premium membership!');

        return view('success', compact('subscription'));
    }

}
