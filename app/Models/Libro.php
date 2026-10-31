<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $table = 'libros';

    protected $fillable = [
        'autor_id',
        'titulo',
        'isbn',
        'anio_publicacion',
        'precio',
        'paginas',
        'editorial',
        'idioma',
        'stock',
    ];

    public function autor()
    {
        return $this->belongsTo(Autor::class, 'autor_id');
    }
}
