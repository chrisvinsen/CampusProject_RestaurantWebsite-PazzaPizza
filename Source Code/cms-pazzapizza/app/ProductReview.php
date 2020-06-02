<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductReview extends Model
{
    use SoftDeletes;

	protected $table = 'product_review';

	protected $dates = ['deleted_at'];

	protected $fillable = ['name', 'product_id', 'user_id', 'title', 'message', 'rating' ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    public function user(){
        return $this->belongsTo('App\ModelUser');
    }
}
