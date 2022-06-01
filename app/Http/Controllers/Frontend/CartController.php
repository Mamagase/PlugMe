<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if (Auth::check()) {

            $prod_check = Product::where('id', $product_id)->first();
            if ($prod_check) {
                
                if (Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    
                    return response()->json(['warn' => $prod_check->name." Already Added to Cart."]);
                }
                elseif ($prod_check->qty > 0 && $prod_check->qty < $product_qty) {
                    
                    return response()->json(['warn' => $prod_check->qty." product(s) available."]);
                }
                else {
                    
                    $cartItem = new Cart();
                    $cartItem->prod_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->prod_qty = $product_qty;
                    $cartItem->save();
                    return response()->json(['status' => $prod_check->name." Added to Cart!"]);
                }
            }
        }else {
            
            return response()->json(['warn' => "Login to Continue."]);
        }
    }

    public function viewCart()
    {
        $carts = Cart::where('user_id', Auth::id())->get();
        return view('frontend.cart', compact('carts'));
    }

    public function updateCart(Request $request)
    {
        $prod_id = $request->input('prod_id');
        $qty = $request->input('prod_qty');

        if (Auth::check()) {
            
            if (Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                
                $cart = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cart->prod_qty = $qty;
                $cart->update();
                return response()->json(['status' => "Quantity Updated!"]);
            }
        }
        else {
            
            return response()->json(['warn' => "Login to Continue."]);
        }
    }

    public function deleteProduct(Request $request)
    {   
        if (Auth::check()) {
            
            $prod_id = $request->input('prod_id');
            if (Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                
                $cart = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cart->delete();
                return response()->json(['status' => "Product Removed Successfully!"]);
            }
            else
            {
                return response()->json(['status' => "Product Already Removed."]);
            }

        }
        else {
            
            return response()->json(['warn' => "Login to Continue."]);
        }
    }
}
