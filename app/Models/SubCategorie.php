<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categorie;
use App\Models\Type;

class SubCategorie extends Model
{
    use HasFactory;
    protected $table = 'sub_categories';
    protected $guarded = ['id'];

    public function categorie () {
        return $this->belongsTo(Categorie::class);
    }
    public function type () {
        return $this->belongsTo(Type::class);
    }

}