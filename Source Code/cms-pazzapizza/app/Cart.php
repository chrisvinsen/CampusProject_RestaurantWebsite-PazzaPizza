<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use SoftDeletes;

	protected $table = 'cart';

	protected $dates = ['deleted_at'];

	protected $fillable = ['product_id', 'user_id', 'quantity_order' ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    public function product(){
        return $this->belongsTo('App\Product');
    }
}
