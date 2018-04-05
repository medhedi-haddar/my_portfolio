<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    public function works(){

        return $this->belongsTo(Works::class);
    }
}
