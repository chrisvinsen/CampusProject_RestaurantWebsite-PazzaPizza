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

class TransactionController extends Controller
{
    public function index()
    {
    	$title = "Checkout";
        $nav_menu = 'menu';

        if (Session::get('login') && Session::get('id')){
            $user = ModelUser::where('id', Session::get('id'))->first();
            $total_favorite = UserFavorite::where('user_id', $user->id)->count();
            $total_cart = Cart::where('user_id', $user->id)->count();
        	$cart_lists = Cart::where('user_id', $user->id)->where('quantity_order', '>', 0)->orderBy('created_at', 'desc')->get();
        	return view('cms.checkout', compact('title', 'nav_menu', 'user', 'total_favorite', 'total_cart', 'cart_lists'));
        }
        else
            return redirect()->route('account.login');
        
    }

    public function store(Request $request)
    {
    	if (Session::get('login') && Session::get('id')){
            $user = ModelUser::where('id', Session::get('id'))->first();

            if($request->address && $request->phone_number && $request->money){
                $cart_lists = Cart::where('user_id', $user->id)->where('quantity_order', '>', 0)->get();

                $checking_stock = true;

                foreach($cart_lists as $key => $cart){
                	$temp_product = Product::where('id', $cart->product->id)->first();
                	if($cart->quantity_order > $temp_product->stock )
                		$checking_stock = false;
                }

                if($checking_stock){
	                $data = Transaction::create([
	                    'user_id'            => $user->id,
	                    'total'         	 => $request->money,
	                    'address'		     => $request->address,
	                    'phone_number'	     => $request->phone_number,
	                    'order_notes'	     => $request->order_notes,
	                ]);

	                foreach($cart_lists as $key => $cart){
	                	$temp_product = Product::where('id', $cart->product->id)->first();
	                	$data_product = Product::where('id', $cart->product->id)->update([
	                		'stock'		=>	($temp_product->stock - $cart->quantity_order),
	                	]);

		                $data_details = TransactionDetails::create([
		                	'transaction_id'		=> $data->id,
		                	'product_id'			=> $cart->product->id,
		                	'quantity_order'		=> $cart->quantity_order,
		                ]);
	                }

	                $cart = Cart::where('user_id', $user->id )->delete();

	                return Response::json($data);
                }else{
                	$error = [
			            "messages"  => "Not enough product stock. Please order again."
			        ];
			        return Response::json($error, 404);
                }
            }
        }
        $error = [
            "messages"  => "Please Login to order a product."
        ];
        return Response::json($error, 404);
    }

    public function confirmation(Transaction $transaction)
    {
        $title = "Menu";
        $nav_menu = 'menu';

        if (Session::get('login') && Session::get('id')){
            $user = ModelUser::where('id', Session::get('id'))->first();
            $total_favorite = UserFavorite::where('user_id', $user->id)->count();
            $total_cart = Cart::where('user_id', $user->id)->count();
            $transaction_details = TransactionDetails::where('transaction_id', $transaction->id)->get();

        	return view('cms.confirmation', compact('title', 'nav_menu', 'user', 'total_favorite', 'total_cart', 'transaction', 'transaction_details'));
        }
        return redirect()->route('menu');
    }

    public function history()
    {
        $title = "History Transaction";
        $nav_menu = 'account';

        if (Session::get('login') && Session::get('id')){
            $user = ModelUser::where('id', Session::get('id'))->first();
            $total_favorite = UserFavorite::where('user_id', $user->id)->count();
            $total_cart = Cart::where('user_id', $user->id)->count();
            $transaction_lists = Transaction::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(12);
        } else
            return redirect()->route('account.login');
        
        return view('cms.history', compact('title', 'nav_menu', 'user', 'total_favorite', 'total_cart', 'transaction_lists'));
    }
}
