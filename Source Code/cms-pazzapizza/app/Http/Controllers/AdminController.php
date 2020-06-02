<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Response;
use File;
use App\ModelUser;
use App\Cart;
use App\Product;
use App\ProductReview;
use App\UserFavorite;
use App\Transaction;
use App\TransactionDetails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller {

    public function index(Request $request) {
        if (Session::get('type') == 'admin'){
            $title = 'Dashboard';
            $nav_menu = 'sales';

            $user = ModelUser::where('id', Session::get('id'))->first();

            // $current_date = date('Y-m-d H:i:s');
            $current_date = "2020-06-28 00:00:01";
            $year_month = date('Y-m',strtotime($current_date));

            $date_start = $year_month . "-01 00:00:01";
            $date_end = $current_date;

            $transaction = TransactionDetails::get();

            $sales_of_month = TransactionDetails::whereBetween('created_at', [new Carbon($date_start), new Carbon($date_end)])
                ->orderBy('created_at', 'asc')
                ->get()
                ->groupBy(function ($val){
                    return Carbon::parse($val->created_at)->format('d');
                });

            $sales_lists = TransactionDetails::orderBy('created_at', 'desc')->paginate(10);

            return view('Admin.index', compact('title', 'nav_menu', 'user', 'sales_of_month', 'sales_lists'));
        }
        else
            return redirect()->route('home');
    }

    public function products(Request $request) {
        if (Session::get('type') == 'admin'){
            $title = 'Product Lists';
            $nav_menu = 'product_lists';

            $user = ModelUser::where('id', Session::get('id'))->first();

            $search = '';

            if($request->has('search')){
                $search = $request->search;
            }

            $product_lists = Product::with('category')
                            ->where(function ($query) use ($search){
                                $query->Where('products.name', 'like', '%' .$search. '%')
                                    ->orWhere('products.description', 'like', '%' .$search. '%')
                                    ->orWhereHas('category', function($query) use ($search){
                                        $query->Where('product_category.name', 'like', '%' .$search. '%');
                                    });
                            })->orderBy('created_at', 'desc')
                                ->paginate(12);

            return view('Admin.products', compact('title', 'nav_menu', 'product_lists', 'user'));
        }
        else
            return redirect()->route('home');
    }

    public function users(Request $request){
        if (Session::get('type') == 'admin'){
            $title = 'User Lists';
            $nav_menu = 'user_lists';

            $search = '';

            if($request->has('search')){
                $search = $request->search;
            }

            $user = ModelUser::where('id', Session::get('id'))->first();

            $user_lists = ModelUser::where(function ($query) use ($search){
                                $query->Where('users.firstname', 'like', '%' .$search. '%')
                                    ->orWhere('users.lastname', 'like', '%' .$search. '%')
                                    ->orWhere('users.email', 'like', '%' .$search. '%')
                                    ->orWhere('users.birthdate', 'like', '%' .$search. '%')
                                    ->orWhere('users.gender', 'like', '%' .$search. '%');
                            })->where('id', '!=', $user->id)
                                ->orderBy('created_at', 'desc')
                                ->paginate(20);

            return view('Admin.users', compact('title', 'nav_menu', 'user' ,'user_lists'));
        }
        else
            return redirect()->route('home');
    }

    public function user_create(){
        if (Session::get('type') == 'admin'){
            $title = 'Add User';
            $nav_menu = 'user_add';

            $user = ModelUser::where('id', Session::get('id'))->first();

            return view('Admin.user_create', compact('title', 'nav_menu', 'user'));
        }
        else
            return redirect()->route('home');
    }

    public function user_store(Request $request){
        if (Session::get('type') == 'admin'){

            //Validation
            if($request->firstname && $request->email && $request->birthdate && $request->gender && $request->password) {

                if($request->hasFile('image')){
                    $filenamewithextension = $request->file('image')->getClientOriginalName();
                    $extension = $request->file('image')->getClientOriginalExtension();

                    $path = public_path('images/user/profile');

                    if(!File::exists($path)) {
                        // path does not exist
                        File::makeDirectory($path, $mode = 0777, true, true);
                    }  

                    $filenametostore = 'images_'.time().'.'.$extension;
                    $path_image = "/images/user/profile/" . $filenametostore;
                    $request->file('image')->move($path, $filenametostore);

                    $data = ModelUser::create([
                        'firstname'         => $request->firstname,
                        'lastname'          => $request->lastname,
                        'email'             => $request->email,
                        'birthdate'         => $request->birthdate,
                        'gender'            => $request->gender,
                        'type'              => $request->type,
                        'password'          => Hash::make($request->password),
                        'photo_profile'     => $path_image
                    ]);
                }else{
                    $data = ModelUser::create([
                        'firstname'         => $request->firstname,
                        'lastname'          => $request->lastname,
                        'email'             => $request->email,
                        'birthdate'         => $request->birthdate,
                        'gender'            => $request->gender,
                        'type'              => $request->type,
                        'password'          => Hash::make($request->password),
                    ]);
                }
                return Response::json($data);

            }
            $error = [
                "messages"  => "Cannot update Profile."
            ];
            return Response::json($error, 404);
        }
        return redirect()->route('home');
    }

    public function user_destroy(ModelUser $modelUser){
        $old_favorite_data = UserFavorite::where('user_id', $modelUser->id)->delete();
        $old_cart_data = Cart::where('user_id', $modelUser->id)->delete();
        $old_review_data = ProductReview::where('user_id', $modelUser->id)->delete();
        $old_transaction_data = Transaction::where('user_id', $modelUser->id)->delete();

        $modelUser->delete();

        return Response::json($modelUser);
    }

}
