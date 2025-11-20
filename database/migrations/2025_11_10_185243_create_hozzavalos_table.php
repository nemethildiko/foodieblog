<?php
// Készítette: Mészáros Eszter (modell struktúra)

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('hozzavalos', function (Blueprint $table) {
            $table->id();
            $table->string('nev');
            $table->string('mertekegyseg')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hozzavalos');
    }
};
