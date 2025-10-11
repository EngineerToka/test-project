<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArtWorkImages extends Model
{
      protected $fillable = ['path'];

    public function imageable(){
        return $this->morphTo();
    }
    public function getPathAttribute($value)
     {
    return asset('storage/' . $value);
     }
}
