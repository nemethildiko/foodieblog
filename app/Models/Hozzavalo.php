<?php
// Készítette: Mészáros Eszter (modell struktúra)

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hozzavalo extends Model
{
    use HasFactory;

    protected $table = 'hozzavalos';
    protected $fillable = ['nev', 'tipus'];

    public function etelek()
    {
        return $this->belongsToMany(Etel::class, 'hasznalts', 'hozzavalo_id', 'etel_id')
                    ->withPivot(['mennyiseg', 'egyseg'])
                    ->withTimestamps();
    }
}

