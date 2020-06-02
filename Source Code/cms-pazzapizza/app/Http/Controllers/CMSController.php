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

class CMSController extends Controller
{
    public function home()
    {
        $title = "Home";
        $nav_menu = 'home';

        if (Session::get('login') && Session::get('id')){
            $user = ModelUser::where('id', Session::get('id'))->first();
            $total_favorite = UserFavorite::where('user_id', $user->id)->count();
            $total_cart = Cart::where('user_id', $user->id)->count();
        }
        else{
            $user = null;
            $total_favorite = 0;
            $total_cart = 0;
        }

        $category_lists = ProductCategory::get();
        $new_product_lists = Product::orderBy('created_at', 'desc')->limit(4)->get();

        $best_transaction_lists = TransactionDetails::select('product_id')->distinct()->get();

        return view('cms.home', compact('title', 'nav_menu', 'user', 'total_favorite', 'category_lists', 'new_product_lists', 'best_transaction_lists', 'total_cart'));
    }

    public function menu(Request $request)
    {
        $title = "Menu";
        $nav_menu = 'menu';
        $search = '';
        $category = '';
        $min_price = '';
        $max_price = '';

        if (Session::get('login') && Session::get('id')){
            $user = ModelUser::where('id', Session::get('id'))->first();
            $total_favorite = UserFavorite::where('user_id', $user->id)->count();
            $total_cart = Cart::where('user_id', $user->id)->count();
        }
        else{
            $user = null;
            $total_favorite = 0;
            $total_cart = 0;
        }

        if($request->has('search')){
            $search = $request->search;
        }
        if($request->has('category')){
            $category = $request->category;
        }
        if($request->has('min_price')){
            $min_price = $request->min_price;
        }
        if($request->has('max_price')){
            $max_price = $request->max_price;
        }

        $category_lists = ProductCategory::get();
        $all_product_lists = Product::get();

        if($search != ''){
            $product_lists = Product::with('category')
                            ->where(function ($query) use ($search){
                                $query->Where('products.name', 'like', '%' .$search. '%')
                                    ->orWhere('products.description', 'like', '%' .$search. '%')
                                    ->orWhereHas('category', function($query) use ($search){
                                        $query->Where('product_category.name', 'like', '%' .$search. '%');
                                    });
                            });
        }else{
            $product_lists = Product::with('category');
        }

        if($category != ''){
            $product_lists = $product_lists->where('category_id', $category);
        }
        if($min_price != ''){
            $product_lists = $product_lists->where('price', '>=', $min_price);
        }
        if($max_price != ''){
            $product_lists = $product_lists->where('price', '<=', $max_price);
        }

        if($request->has('sorting')){
            if($request->sorting == "name_asc"){
                $product_lists = $product_lists->orderBy('name', 'asc');
            }else if($request->sorting == "name_desc"){
                $product_lists = $product_lists->orderBy('name', 'desc');
            }else if($request->sorting == "price_asc"){
                $product_lists = $product_lists->orderBy('price', 'asc');
            }else if($request->sorting == "price_desc"){
                $product_lists = $product_lists->orderBy('price', 'desc');
            }else if($request->sorting == "created_asc"){
                $product_lists = $product_lists->orderBy('created_at', 'asc');
            }else if($request->sorting == "created_desc"){
                $product_lists = $product_lists->orderBy('created_at', 'desc');
            }
        }else{
            $product_lists = $product_lists->orderBy('created_at', 'desc');
        }

        if($request->has('paginate')){
            if($request->paginate == 20){
                $product_lists = $product_lists->paginate(20);
            }else if($request->paginate == 40){
                $product_lists = $product_lists->paginate(40);
            }else if($request->paginate == 60){
                $product_lists = $product_lists->paginate(60);
            }
        }else{
            $product_lists = $product_lists->paginate(12);
        }

        return view('cms.menu', compact('title', 'nav_menu','product_lists', 'all_product_lists','category_lists', 'user', 'total_favorite', 'total_cart'));
    }

    public function details(Product $product)
    {
        $title = "Menu";
        $nav_menu = 'menu';

        if (Session::get('login') && Session::get('id')){
            $user = ModelUser::where('id', Session::get('id'))->first();
            $total_favorite = UserFavorite::where('user_id', $user->id)->count();
            $total_cart = Cart::where('user_id', $user->id)->count();

            $transaction_to_be_reviewed = TransactionDetails::with('transaction')
                            ->where(function ($query) use ($product, $user) {
                                $query->Where('transaction_details.product_id', $product->id)
                                    ->Where('transaction_details.review_id', null)
                                    ->WhereHas('transaction', function($query) use ($user) {
                                        $query->Where('transaction.user_id', $user->id);
                                    });
                            })->first();
        }   
        else{
            $user = null;
            $total_favorite = 0;
            $total_cart = 0;
            $transaction_to_be_reviewed = null;
        }

        $product_details = Product::where('id', $product->id)->first();
        $review_lists = ProductReview::where('product_id', $product->id)->orderBy('created_at', 'desc')->limit(5)->get();

        $total_review = ProductReview::where('product_id', $product->id)->count();
        $total_5star = ProductReview::where('product_id', $product->id)->where('rating', 5)->count();
        $total_4star = ProductReview::where('product_id', $product->id)->where('rating', 4)->count();
        $total_3star = ProductReview::where('product_id', $product->id)->where('rating', 3)->count();
        $total_2star = ProductReview::where('product_id', $product->id)->where('rating', 2)->count();
        $total_1star = ProductReview::where('product_id', $product->id)->where('rating', 1)->count();

        if($total_review > 0)
            $overall_review = ((5 * $total_5star) + (4 * $total_4star) + (3 * $total_3star) + (2 * $total_2star) + (1 * $total_1star)) / $total_review;
        else
            $overall_review = 0.0;

        return view('cms.menu_details', compact('title', 'nav_menu', 'user', 'product_details', 'review_lists', 'total_review', 'total_5star', 'total_4star', 'total_3star', 'total_2star', 'total_1star', 'overall_review', 'total_favorite', 'total_cart', 'transaction_to_be_reviewed'));
    }

    public function pay(Request $request, Transaction $transaction)
    {   
        $request->validate([
            'address' => 'required',
            'phone_number' => 'required',
            'order_notes' => 'required'                       
        ]);

        $cart_lists = Cart::All();
        foreach($cart_lists as $cart){
            Transaction::create([
                'product_id' => $cart->product_id,
                'product_name' => $cart->product_name,
                'price' => $cart->price,
                'image_url' => $cart->image_url,
                'stock' => $cart->stock,
                'quantity' => $cart->quantity,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'order_notes' => $request->order_notes]);
        }
        return redirect('/update/product');
    }

    public function updateproduct()
    {
        $product_lists = Product::All();
        $cart_lists = Cart::All();

        foreach($cart_lists as $cart){
            foreach($product_lists as $product){
                if($cart->product_id == $product->id){
                    $temp = $product->stock - $cart->quantity;
                    Product::where('id',$product->id)  //update stock
                    ->update([
                        'Stock' => $temp
                    ]);
                    Cart::destroy($cart->id); //delete cart
                }
            }
        }
        return redirect(route('menu.order.confirmation'));
    }

    public function aboutus()
    {
        $title = "About";
        $nav_menu = 'aboutus';

        if (Session::get('login') && Session::get('id')){
            $user = ModelUser::where('id', Session::get('id'))->first();
            $total_favorite = UserFavorite::where('user_id', $user->id)->count();
            $total_cart = Cart::where('user_id', $user->id)->count();
        }
        else{
            $user = null;
            $total_favorite = 0;
            $total_cart = 0;
        }

        $new_product_lists = Product::orderBy('created_at', 'desc')->limit(6)->get();

        return view('cms.aboutus', compact('title', 'nav_menu', 'user', 'total_favorite', 'new_product_lists', 'total_cart'));
    }

    public function contact()
    {
        $title = "Contact";
        $nav_menu = 'contact';

        if (Session::get('login') && Session::get('id')){
            $user = ModelUser::where('id', Session::get('id'))->first();
            $total_favorite = UserFavorite::where('user_id', $user->id)->count();
            $total_cart = Cart::where('user_id', $user->id)->count();
        }
        else{
            $user = null;
            $total_favorite = 0;
            $total_cart = 0;
        }
        
        return view('cms.contact', compact('title', 'nav_menu', 'user', 'total_favorite', 'total_cart'));
    }

    public function addtocart(Request $request, Cart $cart)
    {

        $check = Cart::where('product_id', $request->product_id)->first();  //check datanya udah ke isi belum   

        if($cart->count() == 0){
            Cart::create([
                'product_id' => $request->product_id,
                'product_name' => $request->product_name,
                'price' => $request->price,
                'image_url' => $request->image_url,
                'stock' => $request->stock,
                'quantity' => 1]);
                
            return redirect(route('menu.order.cart'));
        }elseif($check){
            return redirect(route('menu.order.cart'));
        }else{
            Cart::create([
                'product_id' => $request->product_id,
                'product_name' => $request->product_name,
                'price' => $request->price,
                'image_url' => $request->image_url,
                'stock' => $request->stock,
                'quantity' => 1]);
            return redirect(route('menu.order.cart'));
        }   
    }

    public function updatecart(Request $request, Cart $cart)
    {
       if($request->quantity == 0){
            Cart::destroy($request->id);
       }else{
        Cart::where('id',$cart->id)
            ->update([
                'quantity' => $request->quantity
            ]);
        }
        return redirect(route('menu.order.cart')); 
    }

    public function logout()
    {
        $title = "Logout";
        $nav_menu = 'account';

        if (Session::get('login') && Session::get('id'))
            $user = ModelUser::where('id', Session::get('id'))->first();
        else
            return redirect()->route('account.login');
        
        return view('cms.logout', compact('title', 'nav_menu', 'user'));
    }
}
