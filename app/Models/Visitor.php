<?php

namespace App\Models;

use App\Models\Chat;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visitor extends Model
{
    use HasFactory;
   
    protected $fillable = [
        'name',
        'email'
    ];
    public function chat()
    {
        return $this->hasMany(Chat::class,'visitor_id');
    }
    protected $primaryKey = ['id'];
    protected $keyType = 'string';
    public $incrementing = false;
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (!$model->id) {
                $model->id = Str::uuid();
            }
        });
    }

  



   
}
