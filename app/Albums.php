<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
    public function images()
    {
        return $this->hasMany(Images::class);
    }
}
