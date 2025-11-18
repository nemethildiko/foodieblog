<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Kategoria extends Model
{
    protected $table = 'kategorias'; 

    protected $fillable = ['nev'];

    public function etelek()
    {
        return $this->hasMany(Etel::class);
    }
}
