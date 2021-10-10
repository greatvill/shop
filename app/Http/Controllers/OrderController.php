<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends AbstractApiController
{
    protected string $modelClass = Order::class;
}
