<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Subscribe to a website.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function subscribe(Request $request)
    {
        $request->validate([
            'website_id' => 'required|exists:websites,id',
            'email' => 'required|email',
        ]);

        $subscriber = Subscriber::create([
            'website_id' => $request->input('website_id'),
            'email' => $request->input('email'),
        ]);

        return response()->json(['message' => __('Subscribed successfully.')]);
    }
}
