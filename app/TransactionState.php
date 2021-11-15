<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionState extends Model
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
				'status',
				'visible',];

	protected $table = 'Transaction_states';
}
