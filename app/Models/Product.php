<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categorie;
use App\Models\Image;
use App\Models\Type;

class Product extends Model
{
    use HasFactory;
  
    protected $guarded = ['id'];

    public function image(){
        return $this->hasMany(Image::class);
    }
    public function categorie(){
        return $this->hasMany(Categorie::class);
    }
    public function type(){
        return $this->belongsTo(Type::class);
    }
    
}