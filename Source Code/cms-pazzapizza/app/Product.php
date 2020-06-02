<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

	protected $table = 'products';

	protected $dates = ['deleted_at'];

	protected $fillable = ['name', 'category_id', 'image_url', 'description', 'stock', 'price' ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    public function category(){
        return $this->belongsTo('App\ProductCategory');
    }
}
