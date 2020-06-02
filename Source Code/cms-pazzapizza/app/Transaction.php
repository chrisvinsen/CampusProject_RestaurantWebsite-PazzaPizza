<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

	protected $table = 'transaction';

	protected $dates = ['deleted_at'];

	protected $fillable = ['user_id', 'total', 'address', 'phone_number', 'order_notes' ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function user(){
        return $this->belongsTo('App\ModelUser');
    }

    public function details(){
        return $this->hasMany('App\TransactionDetails', 'transaction_id', 'id');
    }

}
