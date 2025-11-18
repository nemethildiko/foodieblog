<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hasznalts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('etel_id');
            $table->unsignedBigInteger('hozzavalo_id');
            $table->decimal('mennyiseg', 8, 2)->nullable();
            $table->string('egyseg', 50)->nullable();
            $table->timestamps();

            $table->foreign('etel_id')
                  ->references('id')
                  ->on('etelek')
                  ->onDelete('cascade');

            $table->foreign('hozzavalo_id')
                  ->references('id')
                  ->on('hozzavalos')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hasznalts');
    }
};
