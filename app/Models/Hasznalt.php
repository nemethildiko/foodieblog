<?php
// Készítette: Mészáros Eszter (modell struktúra)

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasznalt extends Model
{
    use HasFactory;

    protected $table = 'hasznalts';
    protected $fillable = ['etel_id', 'hozzavalo_id', 'mennyiseg', 'egyseg'];

    public function etel()
    {
        return $this->belongsTo(Etel::class, 'etel_id');
    }

    public function hozzavalo()
    {
        return $this->belongsTo(Hozzavalo::class, 'hozzavalo_id');
    }
}
