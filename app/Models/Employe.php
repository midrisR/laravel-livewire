<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;

class Employe extends Model
{
    use HasFactory;
    protected $guarded =['id'];

   public function role() {
    return $this->belongsTo(Role::class);
   }
}