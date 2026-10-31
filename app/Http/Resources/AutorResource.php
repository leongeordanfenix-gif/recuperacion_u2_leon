<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AutorResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'               => $this->id,
            'nombres'          => $this->nombres,
            'nacionalidad'     => $this->nacionalidad,
            'email'            => $this->email,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'biografia'        => $this->biografia,
            'estado'           => (bool) $this->estado,
            'libros'           => LibroResource::collection($this->whenLoaded('libros')),
        ];
    }
}
