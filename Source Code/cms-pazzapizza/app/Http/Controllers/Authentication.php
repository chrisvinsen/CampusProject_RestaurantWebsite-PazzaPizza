<?php

namespace App\Http\Controllers;

use Response;
use File;
use App\ModelUser;
use App\UserFavorite;
use App\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Authentication extends Controller
{
    public function index() {
        if (!Session::get('login')){
            $title = "Login";
            $nav_menu = 'account';

            return view('cms.login', compact('title', 'nav_menu'));
        } else {
            if (Session::get('type') == 'admin') {
                $title = 'Admin';
                $nav_menu = 'admin';

                $products = DB::table('products')->get();
                return view('Admin.index', ['products' => $products], compact('title', 'nav_menu'));
            } else if (Session::get('type') == 'user') {
                $title = "Home";
                $nav_menu = 'home';

                return view('cms.home', compact('title', 'nav_menu'));
            }
        }
    }

    public function register(Request $request) {
        $title = "Register";
        $nav_menu = 'account';

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
        
        return view('cms.register', compact('title', 'nav_menu', 'user', 'total_favorite', 'total_cart'));
    }

    public function registerPost(Request $request){

        //Validation
        if($request->firstname && $request->email && $request->birthdate && $request->gender && $request->password) {

            $data = ModelUser::create([
                'firstname'         => $request->firstname,
                'lastname'          => $request->lastname,
                'email'             => $request->email,
                'birthdate'         => $request->birthdate,
                'gender'            => $request->gender,
                'password'          => Hash::make($request->password),
            ]);
            return Response::json($data);
        }
        $error = [
            "messages"  => "Register Failed. Please try again later."
        ];
        return Response::json($error, 404);
    }

    public function login() {
        $title = "Login";
        $nav_menu = 'account';

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
        
        return view('cms.login', compact('title', 'nav_menu', 'user', 'total_favorite', 'total_cart'));
    }

    public function loginPost(Request $request) {
        $email = $request->email;
        $password = $request->password;

        $user = DB::table('users')->where('email', $email)->where('deleted_at', '=', null)->first();
        if ($user) {
            if (Hash::check($password, $user->password)) {
                Session::put('id', $user->id);
                Session::put('email', $user->email);
                Session::put('name', $user->firstname . " " . $user->lastname);
                Session::put('login', TRUE);
                Session::put('type', $user->type);

                if ($user->type == 'admin') {
                    return redirect()->route('panel');
                } 

                return redirect()->route('home');
            }
        }
        return redirect()->route('account.login')->with('alert', 'Email or password is wrong');
    }

    public function logout() {
        Session::flush();

        return redirect()->route('account.login');
    }

}
