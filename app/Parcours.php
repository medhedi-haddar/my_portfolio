<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Parcours extends Model
{

    protected  $fillable = ['title','description','type','etablissement','start_date'];

    public function getStartDateAttribute($value){
        return Carbon::parse($value)->format('Y-m-d');
    }
}
