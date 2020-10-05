<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Http\Requests\CartRequest;
use Illuminate\Http\Request;
use App\User;

class CartController extends Controller
{
    public function getCustomerCart(User $user)
    {
        return $user->carts;
    }

    public function store(CartRequest $request, User $user)
    {
        $user->carts()->create($request->validated());
    }

    public function update(CartRequest $request, Cart $cart)
    {
        $cart->update($request->validated());
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
    }
}
