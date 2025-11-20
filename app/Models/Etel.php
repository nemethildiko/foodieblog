<?php
// Készítette: Mészáros Eszter (modell struktúra)

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etel extends Model
{
    use HasFactory;

    protected $table = 'etelek';
    protected $fillable = ['nev', 'kategoria_id', 'leiras'];

    public function kategoria()
    {
        return $this->belongsTo(Kategoria::class, 'kategoria_id');
    }

    public function hozzavalok()
    {
        return $this->belongsToMany(Hozzavalo::class, 'hasznalts', 'etel_id', 'hozzavalo_id')
                    ->withPivot(['mennyiseg', 'egyseg'])
                    ->withTimestamps();
    }
}
