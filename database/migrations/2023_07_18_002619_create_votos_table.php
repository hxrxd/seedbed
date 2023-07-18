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
        Schema::create('votos', function (Blueprint $table) {
            $table->id();
            $table->integer('semilla');
            $table->integer('une');
            $table->integer('nulo');
            $table->integer('blanco');
            $table->integer('sinusar');
            $table->integer('jrv');
            $table->string('fiscal');
            $table->string('status')->nullable($value = 'Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votos');
    }
};
