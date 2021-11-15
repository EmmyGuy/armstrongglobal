<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingSchedule extends Model
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
				'group_id',
				'date',
				'location',
            ];

	protected $table = 'training_schedules';
}
