<?php

namespace App\Models;

use App\Models\ArtWork;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Collection extends Model
{
     use HasFactory;
     protected $fillable = [
        'title',
        'description',
        'user_id',
        'cover_img',
        'status',
        'slug'
    ];

    public function artist(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function artworks(){
        return $this->belongsToMany(ArtWork::class,'art_work_collections')->withTimestamps();
    }
    public function setCoverImgAttribute($value)
    {
    $this->attributes['cover_img'] = 'frontend/uploads/covers/' . $value;
     }

public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
