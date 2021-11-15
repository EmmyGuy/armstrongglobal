<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
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
				'name',
				'email',
				'encrypted_password',
				'salt',
                'age',
				'status',
                'gender'];

	protected $table = 'students';
}
