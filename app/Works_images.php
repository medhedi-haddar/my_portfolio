<?php

namespace App;

use Faker\Provider\Image;
use Illuminate\Database\Eloquent\Model;

class Works_images extends Model
{
    public function works()
    {
        return $this->belongsToMany(Works::class)
            ->withPivot('work_id');
    }

    public function images()
    {
        return $this->belongsToMany(Images::class)
            ->withPivot('image_id');

    }

}
