<?php

namespace Modules\StripehSubscribe\Http\Controllers;

use App\Models\Plans;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;


class Main extends Controller
{
    public function getSubscriptionLink($plan_id)
    {
        //Get the plan
        $plan = Plans::find($plan_id);

        $plan_id = $plan->id;
        $stripe_price_id = $plan->stripe_id;
       
        //Stripe secret key
        $stripe_secret_key = config('settings.stripe_secret');
        $stripe_key = config('settings.stripe_key');


        return auth()->user()
        ->newSubscription('default', $stripe_price_id)
        ->allowPromotionCodes()
        ->checkout([
            'success_url' => route('plans.current'),
            'cancel_url' => route('plans.current'),
            'metadata' => [
                'user_id' => auth()->user()->id,
                'plan_id' => $plan_id,
            ]
        ]);


      
       

        //Based on the above, we need to create a subscription link
        // Create a Payment Link
            $response = Http::withBasicAuth($stripe_secret_key, '')
                ->withHeaders([
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ])
                ->asForm()
                ->post('https://api.stripe.com/v1/checkout/sessions', [
                    'mode' => 'subscription',
                    'line_items[0][price]' => $stripe_price_id,
                    'line_items[0][quantity]' => 1,
                    'success_url' => url('/plan'),
                    'cancel_url' => url('/plan'),
                    'client_reference_id' => auth()->user()->id,
                    'allow_promotion_codes' => 'true',
                    'customer_email' => auth()->user()->email,
                    'metadata' => [
                        'user_id' => auth()->user()->id,
                        'plan_id' => $plan_id,
                    ]
                ]);

        if ($response->successful()) {
            $paymentLink = $response->json();
            return redirect($paymentLink['url']); // Redirect to the payment link
        }else{
            dd($response->json());
        }

        // Handle error
        return back()->withErrors(['status' => 'Unable to create payment link. Please try again.']);
    }

    protected function handleCheckoutSessionCompleted($session)
    {
        // Activate subscription or update your system
        // $session contains the session details

        // Get user and plan from metadata
        $userId = $session->metadata->user_id;
        $planId = $session->metadata->plan_id;

        // Find the user
        $user = User::where('id', $userId)->first();
        if (!$user) {
            return response('User not found', 404);
        }

        // Update user subscription details
        $user->plan_id = $planId;
        $user->plan_status = 'active';
        $user->stripe_subscription_id = $session->subscription;
        
        // Store customer portal URL for later management
        if (isset($session->customer_portal_url)) {
            $user->update_url = $session->customer_portal_url;
        }
        
        $user->save();

        return response()->json(['message' => 'Subscription activated successfully']);
    }

    public function webhook(Request $request)
    {


        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $secret = config('stripeh-subscribe.stripe_webhook_secret');

        if (!$sigHeader) {
            return response('Missing signature header', 400);
        }
    
        // Parse Stripe-Signature header
        $signatureParts = [];
        parse_str(str_replace(',', '&', $sigHeader), $signatureParts);
    
        $timestamp = $signatureParts['t'] ?? null;
        $expectedSignature = $signatureParts['v1'] ?? null;
    
        if (!$timestamp || !$expectedSignature) {
            return response('Invalid signature format', 400);
        }
    
        // Create the signed payload
        $signedPayload = $timestamp . '.' . $payload;
    
        // Compute HMAC-SHA256
        $computedSignature = hash_hmac('sha256', $signedPayload, $secret);
    
        // Compare signatures securely
        if (!hash_equals($computedSignature, $expectedSignature)) {
            return response('Invalid signature', 400);
        }
    
        // Handle the event if verification passes
        $event = json_decode($payload);
    
        switch ($event->type) {
            case 'checkout.session.completed':
                $session = $event->data->object; // Process session data
                return $this->handleCheckoutSessionCompleted($session);
                break;

            case 'payment_intent.succeeded':
                $paymentIntent = $event->data->object;
                // Handle successful payment
                break;
            case 'payment_intent.payment_failed':
                $paymentIntent = $event->data->object; 
                // Handle failed payment
                break;
    
            default:
                // Handle other event types
                break;
        }
    
        return response('Webhook handled', 200);




       

    }


    

}
