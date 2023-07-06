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
        Schema::create('fiscals', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');   
            $table->string('dpi');      
            $table->string('departamento');
            $table->string('municipio');           
            $table->string('telefono');
            $table->string('rango_edad');
            $table->string('sexo');
            $table->string('correo');
            $table->string('status')->nullable($value = 'Active');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fiscals');
    }
};
