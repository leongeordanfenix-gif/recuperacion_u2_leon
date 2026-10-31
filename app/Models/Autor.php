<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Autor extends Model
{
    protected $table = 'autores';

    protected $fillable = [
        'nombres',
        'nacionalidad',
        'email',
        'fecha_nacimiento',
        'biografia',
        'estado',
    ];

    public function libros(): HasMany
    {
        return $this->hasMany(Libro::class, 'autor_id');
    }
}
