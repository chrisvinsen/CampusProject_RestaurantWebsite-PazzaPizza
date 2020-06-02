<?php

namespace App\Http\Controllers;

use App\ModelUser;
use App\UserFavorite;
use App\Cart;
use Response;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserProfileController extends Controller
{
    public function index(ModelUser $modelUser)
    {

    	if (Session::get('login') && Session::get('id')){

            $user = ModelUser::where('id', Session::get('id'))->first();

            $total_favorite = UserFavorite::where('user_id', $user->id)->count();
            $total_cart = Cart::where('user_id', $user->id)->count();

            if($user->id == $modelUser->id){
		        $nav_menu = "account";
		        $title = "Profile";

		        $profile = ModelUser::where('id', $modelUser->id)     
		                    ->first();

		        if (Session::get('login') && Session::get('id'))
		            $user = ModelUser::where('id', Session::get('id'))->first();
		        else
		            $user = null;
		        
		        return view('cms.profile', compact('title', 'nav_menu', 'profile', 'user', 'total_favorite', 'total_cart'));
            }
    	}

        return redirect()->route('account.login');
    }

    public function edit(ModelUser $modelUser)
    {
    	if (Session::get('login') && Session::get('id')){

            $user = ModelUser::where('id', Session::get('id'))->first();

            if($user->id == $modelUser->id){
		    	$tempUser = $modelUser;
		    	$tempUser->password = null;
		        return Response::json($tempUser);
            }
        }

        return redirect()->route('account.login');
    }

    public function update(Request $request, ModelUser $modelUser)
    {
    	if (Session::get('login') && Session::get('id')){

            $user = ModelUser::where('id', Session::get('id'))->first();

            if($user->id == $modelUser->id){
            	//Validation
			    if($request->firstname && $request->email && $request->birthdate && $request->gender) {
			        $modelUser->update([
			            'firstname'         => $request->firstname,
			            'lastname'          => $request->lastname,
			            'email'          	=> $request->email,
			            'birthdate'         => $request->birthdate,
			            'gender'     	   	=> $request->gender,
			        ]);

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

			            $modelUser->update([
			                'photo_profile'     => $path_image,
			            ]);
			        }
				    return Response::json($modelUser);
			    }else if($request->oldpassword && $request->newpassword){
			    	if(password_verify($request->oldpassword, $modelUser->password)){
			    		$modelUser->update([
			    			'password'		=> Hash::make($request->newpassword)
			    		]);

			    		return Response::json($modelUser);
			    	}else{
			    		$error = [
				            "messages"  => "Old Password Wrong.",
				        ];
				        return Response::json($error, 404);
			    	}
			    }else{
			        $error = [
			            "messages"  => "Cannot update Profile."
			        ];
			        return Response::json($error, 404);
			    }
            }
        }
        return redirect()->route('account.login');

    }
}
