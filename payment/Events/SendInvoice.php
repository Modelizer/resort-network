<?php

namespace Modelizer\Resort\Payment\Events;

use Modelizer\Resort\Payment\Amount;
use Modelizer\Resort\Payment\Models\UserPaymentDetail;

class SendInvoice
{
    public function __construct(UserPaymentDetail $recipient, Amount $amount) { }
}
