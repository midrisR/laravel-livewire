<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employe;

class Role extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    
   public function employe() {
    return $this->hasOne(Employe::class);
   }
}