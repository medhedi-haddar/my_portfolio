<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
    protected  $fillable = ['name','description'];

    public function images()
    {
        return $this->hasMany(Images::class);
    }
}
