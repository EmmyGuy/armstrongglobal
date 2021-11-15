<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * The guarded attribute(s).
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
				// 'order_id',
				'project_id',
				'price',
				'status_id',
                'authorization_code',
                'remember_token',
                'buyer_email',
				'buyer_phone_num',
				'visible',];

	protected $table = 'transactions';
}
