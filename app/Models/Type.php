<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Type extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
    public function sub_categorie () {
        return $this->hasOne(App\Models\SubCategorie::class);
    }
}