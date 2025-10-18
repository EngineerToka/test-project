<?php

namespace App\Models;

use App\Models\Collection;
use App\Models\User;
use App\Models\artWorkImages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArtWork extends Model
{
     use SoftDeletes;
     use HasFactory;
     protected $fillable = ['title','description','user_id','price'];

     public function artist(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function collection(){
        return $this->belongsToMany(Collection::class,'art_work_collections')->withTimestamps();
    }

    public function images(){
    return $this->morphMany(ArtWorkImages::class, 'imageable');
}

}
