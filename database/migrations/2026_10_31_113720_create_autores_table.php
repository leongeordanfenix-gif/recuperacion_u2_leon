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
        Schema::create('autores', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 100);
            $table->string('nacionalidad');
            $table->string('email')->unique();
            // campos adicionales
            $table->date('fecha_nacimiento');
            $table->text('biografia')->nullable();
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });
    }
};
