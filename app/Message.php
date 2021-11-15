<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
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
                'user_email',
                'full_name',
				'phone_number',
                'message',
                'subject',
				'status_id',
				'visible',];

	protected $table = 'messages';
}
