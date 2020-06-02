<?php

namespace App\Http\Controllers;

use Response;
use DB;
use App\ModelUser;
use App\Product;
use App\ProductCategory;
use App\ProductReview;
use App\UserFavorite;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserFavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Favorite";
        $nav_menu = 'account';

        if (Session::get('login') && Session::get('id')){
            $user = ModelUser::where('id', Session::get('id'))->first();

            $total_favorite = UserFavorite::where('user_id', $user->id)->count();
            $total_cart = Cart::where('user_id', $user->id)->count();
            $favorite_lists = UserFavorite::with('user', 'product')->where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(12);

            return view('cms.favorite', compact('title', 'nav_menu', 'user', 'favorite_lists', 'total_favorite', 'total_cart'));  
        }
        else
            return redirect()->route('account.login');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Session::get('login') && Session::get('id')){
            $user = ModelUser::where('id', Session::get('id'))->first();

            if($request->product_id && $user->id){
                $check_favorite = UserFavorite::where('user_id', $user->id)->where('product_id', $request->product_id)->first();
                if(!$check_favorite){
                    $data = UserFavorite::create([
                        'product_id'       => $request->product_id,
                        'user_id'          => $user->id,
                    ]);
                    return Response::json($data);
                }else{
                    $error = [
                        "messages"  => "Product already exist in Favorite lists.",
                        "status"    => "no"
                    ];
                    return Response::json($error, 404);
                }
            }
        }
        $error = [
            "messages"  => "Please Login to add product to your Favorite List.",
            "status"    => "login"
        ];
       
        return Response::json($error, 404);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserFavorite  $userFavorite
     * @return \Illuminate\Http\Response
     */
    public function show(UserFavorite $userFavorite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserFavorite  $userFavorite
     * @return \Illuminate\Http\Response
     */
    public function edit(UserFavorite $userFavorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserFavorite  $userFavorite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserFavorite $userFavorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserFavorite  $userFavorite
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserFavorite $userFavorite)
    {
        if (Session::get('login') && Session::get('id')){
            $user = ModelUser::where('id', Session::get('id'))->first();

            if($user->id == $userFavorite->user_id){
                $userFavorite->delete();
                return Response::json($userFavorite);
            }
        }
    }
}
