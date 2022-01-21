<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Type;
use App\Models\SubCategorie;
use Illuminate\Support\Facades\DB;
class Categorie extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function sub_categorie () {
        return $this->hasMany(SubCategorie::class);
    }
}