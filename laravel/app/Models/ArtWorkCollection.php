<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArtWorkCollection extends Model
{
     use HasFactory;
    protected $fillable = ['art_work_id','collection_id'];
}
