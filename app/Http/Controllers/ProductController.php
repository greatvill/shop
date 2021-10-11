<?php

namespace App\Http\Controllers;

use App\Models\Order;

class ProductController extends AbstractApiController
{
    protected string $modelClass = Order::class;
}
