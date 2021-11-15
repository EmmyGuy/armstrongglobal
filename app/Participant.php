<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    //
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
				'fullname',
				'dsignation',
				'application_id',
				// 'salt',
                // 'age',
				// 'status',
                // 'gender'
            ];

	protected $table = 'participants';

    static function getCategory($lga){

        if($lga == 'Jos North'|| $lga == 'Jos East'  || $lga == 'Bassa'){
            return 'Category A';
        }elseif($lga == 'Jos South'|| $lga == 'Riyom' || $lga == 'B/Ladi' || $lga == 'Bokkos'){
            return 'Category B';
        }elseif($lga == 'Mangu'|| $lga == 'Pankshin'|| $lga == 'Kanam'){
            return 'Category C';
        }elseif($lga == 'Wase'|| $lga == 'Langtang North'|| $lga == 'Langtang South'){
            return 'Category D';
        }else{
            return 'Category E';
        }

    }
}
