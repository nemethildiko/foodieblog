<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('etelek', function (Blueprint $table) {
            $table->id();
            $table->string('nev');
            $table->foreignId('kategoria_id')
                  ->constrained('kategorias')
                  ->onDelete('cascade');
            $table->text('leiras')->nullable();
            $table->date('felirdatum')->nullable();   
            $table->date('elsodatum')->nullable();    
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('etelek');
    }
};

