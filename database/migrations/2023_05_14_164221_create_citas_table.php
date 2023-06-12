<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->primary(['user_id', 'medico_id', 'centro_id', 'fechainicio', 'fechafin']);
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('medico_id')->references('id')->on('users');
            $table->foreignId('centro_id')->references('id')->on('centros');
            $table->dateTime('fechainicio');
            $table->dateTime('fechafin');
            $table->string('estado');
            $table->timestamps();
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cita');
    }
};
