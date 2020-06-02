<?php

namespace App\Http\Controllers;

use App\ProductReview;
use App\ModelUser;
use App\Transaction;
use App\TransactionDetails;
use DB;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

            if($request->title && $request->rating && $request->product_id && $request->transaction_id){
                $data = ProductReview::create([
                    'user_id'           => $user->id,
                    'product_id'        => $request->product_id,
                    'rating'            => $request->rating,
                    'title'             => $request->title,
                    'message'           => $request->message,
                ]);

                $update_transaction = TransactionDetails::where('id', $request->transaction_id)->update([
                    'review_id'     => $data->id,
                ]);

            }else{
                $error = [
                    "messages"  => "Cannot add new Content."
                ];
                return Response::json($error, 404);
            }
            return Response::json($data);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function show(ProductReview $productReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductReview $productReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductReview $productReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductReview $productReview)
    {
        //
    }
}
