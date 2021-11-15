<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
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
				'respondent_id',
				'question_id',
				'answer_id',
				'status',
                'student'];

	protected $table = 'responses';
}
