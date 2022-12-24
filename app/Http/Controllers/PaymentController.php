<?php

namespace App\Http\Controllers;

use App\Models\XWEB_CREDITS;
use App\Models\XWEB_PAYMENTS;
use Faker\Provider\Payment;
use Illuminate\Http\Request;
use Omnipay\Omnipay;

class PaymentController extends Controller
{
    private $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }

    public function pay(Request $request)
    {
        try {
            $response = $this->gateway->purchase(array(
               'amount' => $request->amount,
               'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success'),
                'cancelUrl' => url('error')
            ))->send();

            if ($response->isRedirect()){
                $response->redirect();
            }else{
                return $response->getMessage();
            }

            } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function success(Request $request)
    {
        if ($request->paymentId && $request->PayerID)
        {
            $transaction = $this->gateway->completePurchase(array(
               'payer_id' => $request->PayerID,
               'transactionReference' => $request->paymentId
            ));

            $response = $transaction->send();

            if ($response->isSuccessful())
            {
                $arr = $response->getData();

                $payment = new XWEB_PAYMENTS();
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr['state'];

                $payment->save();

                $credits = XWEB_CREDITS::where('name', '=', session('User'))->first();
                $newcredits = 321 + $credits->credits;
                XWEB_CREDITS::where('name', $credits->name)
                    ->update(['credits' => $newcredits,
                ]);
                return redirect('/account-panel')->withSuccess('You have buy credits successfully!');

            }
            else
            {
                return $response->getMessage();
            }
        }
        else
        {
            return redirect('/account-panel')->withErrors('Payment declined!');
        }
    }

    public function error()
    {
        return redirect('/account-panel')->withErrors('User declined the payment!');
    }
}
