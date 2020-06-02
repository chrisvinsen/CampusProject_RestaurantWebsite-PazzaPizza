<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetails extends Model
{
    use SoftDeletes;

	protected $table = 'transaction_details';

	protected $dates = ['deleted_at'];

	protected $fillable = ['transaction_id', 'product_id', 'quantity_order', 'review_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function product(){
        return $this->belongsTo('App\Product');
    }
    public function transaction(){
        return $this->belongsTo('App\Transaction');
    }
    public function review(){
        return $this->hasOne('App\ProductReview', 'id', 'review_id');
    }

}
