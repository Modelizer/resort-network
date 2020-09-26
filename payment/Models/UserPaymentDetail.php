<?php

namespace Modelizer\Resort\Payment\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Modelizer\Resort\Payment\Models\UserPaymentDetail find($id)
 */
class UserPaymentDetail extends Model
{
    protected $connection = 'payment';
}
