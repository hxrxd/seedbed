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
        Schema::create('mesas', function (Blueprint $table) {
            $table->id('jrv');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('departamento');
            $table->string('municipio');
            $table->string('comunidad');
            $table->integer('empadronados');
            $table->string('sector');
            $table->integer('correlativo');
            $table->string('nombre');
            $table->string('ubicacion');
            $table->string('zona');
            $table->string('fiscal')->nullable($value = true);
            $table->integer('estatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mesas');
    }
};
