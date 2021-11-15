<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respondent extends Model
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
				'sex',
				'status'];

	protected $table = 'respondents';
}
