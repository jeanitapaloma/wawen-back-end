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
        return $user->cart->products;
    }

    public function storeOrUpdate(CartRequest $request, User $user)
    {
        $cart = $user->cart;
        if (!$cart) {
            $cart = $user->cart()->create();
        }

        $cart->products()->syncWithoutDetaching([$request->validated()['id'] => [
            'sub_quantity' => $request->validated()['sub_quantity'],
            'sub_total' => $request->validated()['sub_total']
        ]]);
    }

    public function destroy(User $user,$id)
    {
        $user->cart->products()->detach($id);
    }
}
