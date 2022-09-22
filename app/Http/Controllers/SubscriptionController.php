<?php

namespace App\Http\Controllers;

use App\Models\Plan as ModelsPlan;
use Exception;
use Illuminate\Http\Request;
use Laravel\Cashier\Subscription;
use Stripe\Plan;
use App\Models\User;
use App\Http\Controllers\Stripe;
class SubscriptionController extends Controller
{
    public function showPlanForm()
    {
        return view('stripe.plans.create');
    }
    public function savePlan(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        $amount = ($request->amount * 100);

        try {
            $plan = Plan::create([
                'amount' => $amount,
                'currency' => $request->currency,
                'interval' => $request->billing_period,
                'interval_count' => $request->interval_count,
                'product' => [
                    'name' => $request->name
                ]
            ]);

            ModelsPlan::create([
                'plan_id' => $plan->id,
                'name' => $request->name,
                'price' => $plan->amount,
                'billing_method' => $plan->interval,
                'currency' => $plan->currency,
                'interval_count' => $plan->interval_count
            ]);

        }
        catch(Exception $ex){
            dd($ex->getMessage());
        }

        return redirect()->back()->with('create','Plan Created Successfully');
    }
    public function allPlans()
    {
        $basic = ModelsPlan::where('name', 'basic')->first();
        $professional = ModelsPlan::where('name', 'gold')->first();
        $enterprise = ModelsPlan::where('name', 'premium')->first();
        return view('stripe.plans', compact( 'basic', 'professional', 'enterprise'));
    }
    public function checkout($planId)
    {
        $plan = ModelsPlan::where('plan_id', $planId)->first();
        if(! $plan){
            return back()->withErrors([
                'message' => 'Unable to locate the plan'
            ]);
        }

        return view('stripe.plans.checkout', [
            'plan' => $plan,
            'intent' => auth()->user()->createSetupIntent(),
            'receipt_email' => auth()->user()->email

        ]);
    }
    public function processPlan(Request $request)
    {

        $user = auth()->user();
        $user->createOrGetStripeCustomer();
        $paymentMethod = null;
        $paymentMethod = $request->payment_method;

        if($paymentMethod != null){
            $paymentMethod = $user->addPaymentMethod($paymentMethod);
        }
        $plan = $request->plan_id;
        // return $plan;

        // dd($user);


        try {
            $user->newSubscription(
                'default', $plan,
                // 'receipt_email' , auth()->user()->email
            )->create( $paymentMethod != null ? $paymentMethod->id: '');
        }
        catch(Exception $ex){
            return back()->withErrors([
                'error' => 'Unable to create subscription due to this issue '. $ex->getMessage()
            ]);
        }


        // $request->session()->flash('alert-success', 'You are subscribed to this plan');
        return redirect()->route('plans.checkout', $plan)->with('subscribe','You have Successfully Subscribed');
    }
    public function allSubscriptions()
    {

        // return view('stripe.plans', compact( 'basic', 'professional', 'enterprise'));
        if (auth()->user()->onTrial('default')) {
            dd('trial');
        }
        $subscriptions = Subscription::where('user_id', auth()->id())->get();
        return view('stripe.subscriptions.index', compact('subscriptions'));
    }
    public function cancelSubscriptions(Request $request)
    {
        $subscriptionName = $request->subscriptionName;
        if($subscriptionName){
            $user = auth()->user();
            $user->subscription($subscriptionName)->cancel();
            // $invoice = $user->invoices()[0];
            // $user->refund($invoice->charge);
            return back()->with('cancel','Your Subscription has been Cancelled Successfully');
        }
    }
    public function resumeSubscriptions(Request $request)
    {
        $user = auth()->user();
        $subscriptionName = $request->subscriptionName;
        if($subscriptionName){
            $user->subscription($subscriptionName)->resume();
            return back()->with('resume','Your Subscription has been Resumed Successfully');
        }
    }

    public function upgrade(){
        $basic = ModelsPlan::where('name', 'basic')->first();
        $professional = ModelsPlan::where('name', 'gold')->first();
        $enterprise = ModelsPlan::where('name', 'premium')->first();
        return view('stripe.updateplan',compact('basic','professional','enterprise'));
    }

        public function updateplan(Request $request,$planId){

            // $stripe = new \Stripe\StripeClient(
            //     'sk_test_51LGnnGEzIQiMqj2YZsToYh6xtyZC8UDdhzxDqYjGuyLVoqT5BtSfippdeVGxayPUYprQgL9Keh6Vv62ZaOn7gYap00ngrgzdVl'
            //   );
              \Stripe\Stripe::setApiKey('sk_test_51LGnnGEzIQiMqj2YZsToYh6xtyZC8UDdhzxDqYjGuyLVoqT5BtSfippdeVGxayPUYprQgL9Keh6Vv62ZaOn7gYap00ngrgzdVl');

            //   $stripe = Subscription::where('user_id', auth()->id())->first();
            //   return $stripe;
            $plan  = Subscription::where('user_id', auth()->id())->first();
            return $plan;
            $stripe = ModelsPlan::where('plan_id', $planId)->first();
            // $subscriptionName = $request->subscriptionName;
            // return $stripe;
            $subscription = \Stripe\Subscription::retrieve($plan->stripe_id);
            return $subscription;
            // $paymentMethod = $request->payment_method;

            $charge = \Stripe\Subscription::update($stripe->plan_id, [
                'cancel_at_period_end' => false,
                'proration_behavior' => 'create_prorations',
                'billing_cycle_anchor' => 'unchanged',
                'items' => [

                    [
                        'id' => $subscription->items->data[0]->id,
                        'price' =>   $subscription->items->data[0]->price->id,
                    ],
                ],
            ]);
            // return $charge;
            // return $subscription;
            // $stripe = ModelsPlan::where('plan_id', $planId)->first();
            // return $stripe;
            //     $stripe->subscriptions::updateupdate(
            //     $stripe->plan_id,
            //     ['metadata' => ['order_id' =>  $stripe->id]]
            // );

            //   return $stripe->subscriptions;
            //   $stripe->subscriptions->update(
            //     'sub_1Lkv1UEzIQiMqj2YD2ktKnpm',
            //     ['metadata' => ['order_id' => '6735']]
            //   );

        }

        public function refundSubscriptions(Request $request){
            $stripe = new \Stripe\StripeClient('sk_test_51LGnnGEzIQiMqj2YZsToYh6xtyZC8UDdhzxDqYjGuyLVoqT5BtSfippdeVGxayPUYprQgL9Keh6Vv62ZaOn7gYap00ngrgzdVl');

            $package_value = $stripe->charges->all();
            // $package_value = $stripe->charges->all(['limit' => 5]);
            // return $package_value;
            // return $package_value->data[0]->amount;
             $stripe->refunds->create(['charge' => $package_value->data[0]->id, 'amount' => $package_value->data[0]->amount]);


        }

        public function refunds(){
            $stripe = new \Stripe\StripeClient(
                'sk_test_51LGnnGEzIQiMqj2YZsToYh6xtyZC8UDdhzxDqYjGuyLVoqT5BtSfippdeVGxayPUYprQgL9Keh6Vv62ZaOn7gYap00ngrgzdVl'
            );
              $allrefunds =  $stripe->refunds->all();
              return $allrefunds->data;
        }

}
