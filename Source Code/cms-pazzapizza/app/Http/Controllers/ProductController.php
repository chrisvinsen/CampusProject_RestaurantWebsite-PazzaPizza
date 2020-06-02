<?php

namespace App\Http\Controllers;

use Response;
use File;
use App\ModelUser;
use App\Product;
use App\ProductCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function add() {
        if (Session::get('type') == 'admin'){
            $title = 'Add Product';
            $nav_menu = 'product_add';

            $user = ModelUser::where('id', Session::get('id'))->first();

            $category_lists = ProductCategory::get();

            return view('Admin.product_create', compact('title', 'nav_menu', 'category_lists', 'user'));
        }else{
            return redirect('');
        }
    }

    public function addPost(Request $request) {

        if (Session::get('type') == 'admin'){

            if($request->name && $request->category_id && $request->hasFile('image') && $request->description && $request->stock && $request->price) {

                $filenamewithextension = $request->file('image')->getClientOriginalName();
                $extension = $request->file('image')->getClientOriginalExtension();

                $category = ProductCategory::where('id', $request->category_id)->first();

                $path = public_path('images/cms/menu/' . $category->name ."/");

                if(!File::exists($path)) {
                    // path does not exist
                    File::makeDirectory($path, $mode = 0777, true, true);
                }  

                $filenametostore = 'images_'.time().'.'.$extension;
                $path_image = "/images/cms/menu/" . $category->name . "/" . $filenametostore;
                $request->file('image')->move($path, $filenametostore);

                $data = Product::create([
                    'name'            => $request->name,
                    'category_id'     => $request->category_id,
                    'stock'           => $request->stock,
                    'price'           => $request->price,
                    'description'     => $request->description,
                    'image_url'       => $path_image,
                ]);

                $temp_category = ProductCategory::where('id', $request->category_id)->first();

                ProductCategory::where('id', $request->category_id)->update([
                    'total_product'     => $temp_category->total_product + 1
                ]);

            }else{
                $error = [
                    "messages"  => "Cannot add new Product."
                ];
                return Response::json($error, 404);
            }
            return Response::json($data);
        }else{
            return redirect('');
        }
    }

    public function detail(Product $product) {

        if (Session::get('type') == 'admin'){

            $user = ModelUser::where('id', Session::get('id'))->first();

            $title = 'Product Details';
            $nav_menu = 'product_lists';

            $product = Product::where('id', $product->id)->first();

            return view('Admin.product_details', compact('title', 'nav_menu', 'product', 'user'));
        }else{
            return redirect('');
        }
    }

    public function update(Product $product) {

        if (Session::get('type') == 'admin'){

            $user = ModelUser::where('id', Session::get('id'))->first();

            $title = 'Edit Product';
            $nav_menu = 'product_lists';

            $category_lists = ProductCategory::get();

            return view('Admin.product_edit', compact('title', 'nav_menu', 'product', 'category_lists', 'user'));
        }else{
            return redirect('');
        }
    }

    public function updatePost(Request $request, Product $product)
    {
        if (Session::get('type') == 'admin'){

            if($request->name && $request->category_id && $request->description && $request->stock && $request->price) {
                $product->update([
                    'name'            => $request->name,
                    'category_id'     => $request->category_id,
                    'stock'           => $request->stock,
                    'price'           => $request->price,
                    'description'     => $request->description,
                ]);
            }else{
                $error = [
                    "messages"  => "Cannot update Product."
                ];
                return Response::json($error, 404);
            }

            if($request->hasFile('image')){
                $filenamewithextension = $request->file('image')->getClientOriginalName();
                $extension = $request->file('image')->getClientOriginalExtension();

                $category = ProductCategory::where('id', $request->category_id)->first();

                $path = public_path('images/cms/menu/' . $category->name ."/");

                if(!File::exists($path)) {
                    // path does not exist
                    File::makeDirectory($path, $mode = 0777, true, true);
                }  

                $filenametostore = 'images_'.time().'.'.$extension;
                $path_image = "/images/cms/menu/" . $category->name . "/" . $filenametostore;
                $request->file('image')->move($path, $filenametostore);

                $product->update([
                    'image_url'       => $path_image,
                ]);
            }

            return Response::json($product);
        }else{
            return redirect('');
        }
    }

    public function delete(Product $product) {

        if (Session::get('type') == 'admin'){

            $product->delete();

            $temp_category = ProductCategory::where('id', $product->category_id)->first();

            ProductCategory::where('id', $product->category_id)->update([
                'total_product'     => $temp_category->total_product - 1
            ]);

            return Response::json($product);
        }else{
            return redirect('');
        }
    }
}
