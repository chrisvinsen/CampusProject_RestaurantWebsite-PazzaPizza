<?php

namespace App\Http\Controllers;

use Response;
use DB;
use File;
use App\ModelUser;
use App\UserFavorite;
use App\Product;
use App\ProductCategory;
use App\ProductReview;
use App\Cart;
use App\Transaction;
use App\TransactionDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $title = 'Cart';
        $nav_menu = 'menu';

        if (Session::get('login') && Session::get('id')){
            $user = ModelUser::where('id', Session::get('id'))->first();
            $total_favorite = UserFavorite::where('user_id', $user->id)->count();
            $total_cart = Cart::where('user_id', $user->id)->count();

            $cart_lists = Cart::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

            return view('cms.cart', compact('title', 'nav_menu', 'user', 'total_favorite', 'total_cart','cart_lists'));
        }
        else
            return redirect()->route('account.login');
    }

    public function store(Request $request)
    {
        if (Session::get('login') && Session::get('id')){
            $user = ModelUser::where('id', Session::get('id'))->first();

            if($request->product_id && $request->quantity_order && $user->id){
                Cart::where('user_id', $user->id)->where('product_id', $request->product_id)->delete();
                $data = Cart::create([
                    'product_id'         => $request->product_id,
                    'user_id'            => $user->id,
                    'quantity_order'     => $request->quantity_order,
                ]);
                return Response::json($data);
            }
        }
        $error = [
            "messages"  => "Please Login to add product to your Shopping Cart."
        ];
        return Response::json($error, 404);
    }

    public function update(Request $request)
    {
        if (Session::get('login') && Session::get('id')){
            $user = ModelUser::where('id', Session::get('id'))->first();

            if (sizeof($request->product_id) > 0 && sizeof($request->quantity_order) > 0) {
                foreach($request->product_id as $key => $product_id){
                    Cart::where('user_id', $user->id)->where('product_id', $product_id)->update([
                        'quantity_order'    => $request->quantity_order[$key],
                    ]);
                }
            }
            $success = [
                "messages"  => "Success to checkout product."
            ];
            return Response::json($success);
        }
        $error = [
            "messages"  => "Failed to checkout product."
        ];
        return Response::json($error, 404);
    }

    public function destroy(Cart $cart = null)
    {
        if (Session::get('login') && Session::get('id')){
            $user = ModelUser::where('id', Session::get('id'))->first();
            if($cart != null){
                if($user->id == $cart->user_id){
                    $cart->delete();
                    return Response::json($cart);
                }
            }else{
                $cart = Cart::where('user_id', $user->id )->delete();
                return Response::json($cart);
            }
        }
    }

}
