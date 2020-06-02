<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProductCategory extends Model
{
    use SoftDeletes;

	protected $table = 'product_category';

	protected $dates = ['deleted_at'];

	protected $fillable = ['name' ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    public function product(){
        return $this->hasMany('App\Product', 'category_id', 'id');
    }
}
