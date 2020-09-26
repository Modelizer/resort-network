<?php

namespace Modelizer\Resort\Payment;

use Illuminate\Support\Facades\Http;
use Modelizer\Resort\Payment\Events\SendInvoice;
use Modelizer\Resort\Payment\Models\Payment;
use Modelizer\Resort\Payment\Models\UserPaymentDetail;
use Modelizer\Resort\Payment\PaymentProviders\Exceptions\PaymentFailedException;
use Modelizer\Resort\Payment\PaymentProviders\Paypal;

class Transaction
{
    protected $paymentProvider;
    protected $sender;

    public function __construct(PaymentProviderContract $paymentProvider)
    {
        $this->paymentProvider = $paymentProvider;
    }

    public function charge(UserPaymentDetail $sender, Amount $amount)
    {
        $this->paymentProvider->chargeIn(Currency::EURO)->from($sender, $amount)->execute();

        Http::send('post', 'booking.domain');

        event(new SendInvoice($sender, $amount));

        return Payment::create([
            'customer_id' => $sender,
            'amount' => $amount,
        ]);
    }
}

$transaction = new Transaction(new Paypal);

try {
    $customer = UserPaymentDetail::find(1);
    $amount = new Amount(50, Currency::RUPEES);
    $payment = $transaction->charge($customer, $amount);
} catch (PaymentFailedException $exception) {
    // Rollback and inform the user payment failed.
}
