<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * @fiscal_electronico: 1 -> Y, 0 -> N
     * @status: 'Active', 'Inactive'
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
            $table->date('fecha_nacimiento');
            $table->string('sexo');
            $table->string('correo');
            $table->string('fiscal_electronico')->nullable($value = 'N');
            $table->string('status')->nullable($value = 'Active');
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
