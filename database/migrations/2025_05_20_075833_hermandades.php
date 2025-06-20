<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hermandades', function (Blueprint $table) {
            $table->id();
            $table->integer('id_usuario');
            $table->string('nombre');
            $table->text('nombre_completo');
            $table->text('escudo');
            $table->text('header');
            $table->integer('hermanos');
            $table->integer('cuota');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hermandades');
    }
};
