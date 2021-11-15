<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResponseType extends Model
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
				'answer',
				'status'];

	protected $table = 'response_type';
}
