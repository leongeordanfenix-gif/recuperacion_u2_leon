<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LibroResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'               => $this->id,
            'autor_id'         => $this->autor_id,
            'nombre_autor'     => $this->autor->nombres ?? null, //
            'titulo'           => $this->titulo,
            'isbn'             => $this->isbn,
            'anio_publicacion' => $this->anio_publicacion,
            'precio'           => (float) $this->precio,
            'paginas'          => $this->paginas,
            'editorial'        => $this->editorial,
            'idioma'           => $this->idioma,
            'stock'            => $this->stock,
        ];
    }
}
