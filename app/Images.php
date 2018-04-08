<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model

{
    protected  $fillable = ['name','link'];
    
    public function albums(){

        return $this->belongsTo(Albums::class);
    }

    public function works(){
        return $this->hasMany(Works::class);
    }
}
