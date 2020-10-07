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
      $cart =  $user->carts()->create();
      $cart->products()->attach([$request->validated()['id'] => [
        'sub_quantity' => $request->validated()['sub_quantity'],
        'sub_total' => $request->validated()['sub_total']
    ]]);
    }

    public function update(CartRequest $request, Cart $cart)
    {
        $cart->update($request->validated());
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|integer'
        ]);

         if ($validator->fails()) {
            session()->flash('error_message', 'Quantity must be integer');
            return response()->json(['success' => false]);
         }

        Cart::update($cart, $request->sub_quantity);
        session()->flash('success_message', 'Quantity was updated successfully!');

        return response()->json(['success' => true]);
   
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        Cart::remove($cart);
        return redirect('cart')->withSuccessMessage('Item has been removed!');
     
    }
}
