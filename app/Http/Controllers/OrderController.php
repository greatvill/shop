<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;

class OrderController extends AbstractApiController
{
    protected string $modelClass = Order::class;
    protected string $requestStoreClass = StoreOrderRequest::class;
}
