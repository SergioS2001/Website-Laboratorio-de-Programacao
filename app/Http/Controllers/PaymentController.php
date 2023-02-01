<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
class PaymentController extends Controller
{
    public function pay(Request $request)
    {
      
        // setup you stripe key here

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        
       //we have to create a customer for payment
        $customer = Stripe\Customer::create(array(
            'address' => [
                'line1' => '510 Townsend St',
                'postal_code' => '98140',
                'city' => 'San Francisco',
                'state' => 'CA',
                'country' => 'US',
              ],
                "email" => 'jay@gmail.com',
                "name" =>'jay',
                "source" => $request->stripeToken
    
             ));
    
      
        // create a charge for created customer 

        Stripe\Charge::create ([
    
                "amount" => 100,
                "currency" =>'USD',
                "customer" => $customer->id,
                "description" => "how to stripe payment gateway in laravel ",
                'shipping' => [
                  'name' => 'Jenny Rosen',
                  'address' => [
                    'line1' => '510 Townsend St',
                    'postal_code' => '98140',
                    'city' => 'San Francisco',
                    'state' => 'CA',
                    'country' => 'US',
                  ],
                ],
      
        ]); 

   return  "payment success";
    } 
}