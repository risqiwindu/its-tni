<?php

function traineasy_pay(){
  $cart = getCart();
  $method = $cart->getPaymentMethod();
  $code = $method->directory;
  $invoice= $cart->getInvoiceObject();


    $gateway = \Omnipay\Omnipay::create('PayPal_Rest');
    $gateway->initialize(array(
        'clientId' => trim(paymentOption($code,'client_id')),
        'secret'   => trim(paymentOption($code,'secret')),
        'testMode' => empty(paymentOption($code,'mode')), // Or false when you are ready for live transactions

    ));


    $transaction = $gateway->purchase(array(
        'amount'        => number_format(floatval($invoice->amount), 2, '.', ''),
        'currency'      => $invoice->currency->country->currency_code,
        'description'   => __lang('invoice-payment',['invoice'=>$invoice->id]),
        'returnUrl' => route('cart.callback',['code'=>$code],true),
        'cancelUrl' => route('cart',[],true),

    ));


    $response = $transaction->send();
    session()->put('paypal',$response->getTransactionReference());

    // print_r($response);
    //  exit();
    if ($response->isRedirect()) {
        // Yes it's a redirect.  Redirect the customer to this URL:
        $redirectUrl = $response->getRedirectUrl();
        return redirect($redirectUrl);
    }
    else{

        return redirect()->route('cart');
    }

}

function traineasy_callback(){

    $cart = getCart();
    $method = $cart->getPaymentMethod();
    $code = $method->directory;
    $invoice= $cart->getInvoiceObject();
    $gateway = \Omnipay\Omnipay::create('PayPal_Rest');
    $gateway->initialize(array(
        'clientId' => trim(paymentOption($code,'client_id')),
        'secret'   => trim(paymentOption($code,'secret')),
        'testMode' => empty(paymentOption($code,'mode')), // Or false when you are ready for live transactions
    ));


    try {

        $transaction = $gateway->completePurchase(array(
            'payerId'             => $_REQUEST['PayerID'],
            'transactionReference' => session()->get('paypal')
        ));

        $finalResponse = $transaction->send();

        if ($finalResponse->isSuccessful()) {
            // Find the authorization ID
            $results = $finalResponse->getTransactionReference();
            $total = $cart->approve(\Illuminate\Support\Facades\Auth::id());
            $message = __lang('payment-completed');
            flashMessage($message);
            return redirect()->route('student.student.mysessions');

        }else{
            throw new \Exception(__lang('Transaction failed!'));
        }



    } catch (\Exception $e) {
        flashMessage(__lang('payment-unsuccessful').$e->getMessage());

    }

    return redirect()->route('cart');
}



