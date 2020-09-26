<?php

namespace Modelizer\Resort\Payment;

use Stringable;

class Amount implements Stringable
{
    protected $value;
    protected $currency;

    public function __construct($value, $currency = Currency::DOLLAR)
    {
        $this->value = $value;
        $this->currency = $currency;
    }

    public function currency()
    {
        return $this->currency;
    }

    public function __toString()
    {
        return $this->value;
    }
}
