<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArtWorkImages extends Model
{
     use HasFactory;
     
      protected $fillable = ['path'];

    public function imageable(){
        return $this->morphTo();
    }
    public function getPathAttribute($value)
     {
    return asset('storage/' . $value);
     }
}
