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
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('autor_id')->constrained('autores')->onDelete('cascade');
            $table->string('titulo', 150);
            $table->string('isbn')->unique();
            $table->integer('anio_publicacion');
            $table->decimal('precio', 8, 2);
            // Camposadicionales
            $table->integer('paginas');
            $table->string('editorial', 100);
            $table->string('idioma', 50)->default('Español');
            $table->integer('stock')->default(0);
            $table->timestamps();
        });
    }
};
