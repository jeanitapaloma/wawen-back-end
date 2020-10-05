<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Order;
use App\Repository\OrderRepository;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }
    public function index()
    {
        return $this->orderRepository->getAllOrder();
    }

    public function update(OrderRequest $request,Order $order)
    {
        $order->update($request->validated());
    }

    public function destroy(Order $order)
    {
        $order->delete();
    }

    public function store(OrderRequest $request)
    {
        dd($request->validated());
        Order::create($request->validated());
    }


}
