<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applications extends Model
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
				'state',
				'lga',
				'category',
				'group',
				'private_sch_category',
                'name_of_sch',
				'est_year',
				'staff_srength',
				'num_of_std',
				'phone',
				'email',
                'user_id',
                // 'participant_id',
            ];

	protected $table = 'applications';
}

