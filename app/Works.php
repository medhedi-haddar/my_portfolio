<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\DocBlock\Tags\Link;

class Works extends Model
{
    public function images(){
        return $this->hasMany(Images::class);
    }

    public  function links(){
        return $this->hasMany(Links::class);
    }
}
