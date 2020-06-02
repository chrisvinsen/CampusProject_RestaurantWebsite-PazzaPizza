<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserFavorite extends Model
{
    use SoftDeletes;

	protected $table = 'user_favorite';

	protected $dates = ['deleted_at'];

	protected $fillable = ['product_id', 'user_id' ];

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

    public function product(){
        return $this->belongsTo('App\Product');
    }
}
