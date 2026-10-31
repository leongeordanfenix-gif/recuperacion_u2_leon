<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LibroRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $libroId = $this->route('libro');
        $anioActual = date('Y');

        return [
            'autor_id'         => 'required|exists:autores,id',
            'titulo'           => 'required|string|max:150',
            'isbn'             => [
                'required',
                Rule::unique('libros', 'isbn')->ignore($libroId)
            ],
            'anio_publicacion' => "required|integer|min:1900|max:{$anioActual}",
            'precio'           => 'required|numeric|min:0',
            'paginas'          => 'required|integer|min:1',
            'editorial'        => 'required|string|max:100',
            'idioma'           => 'nullable|string|max:50',
            'stock'            => 'required|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'autor_id.required'         => 'El autor es obligatorio.',
            'autor_id.exists'           => 'El autor seleccionado no existe en la base de datos.',
            'titulo.required'           => 'El título del libro es obligatorio.',
            'titulo.max'                => 'El título no debe superar los 150 caracteres.',
            'isbn.required'             => 'El ISBN es obligatorio.',
            'isbn.unique'               => 'Este código ISBN ya está registrado.',
            'anio_publicacion.required' => 'El año de publicación es obligatorio.',
            'anio_publicacion.integer'  => 'El año de publicación debe ser un número entero.',
            'anio_publicacion.min'      => 'El año de publicación debe ser como mínimo 1900.',
            'anio_publicacion.max'      => 'El año de publicación no puede superar el año actual.',
            'precio.required'           => 'El precio del libro es obligatorio.',
            'precio.numeric'            => 'El precio debe ser un valor numérico.',
            'precio.min'                => 'El precio debe ser mayor o igual a 0.',
            'paginas.required'          => 'El número de páginas es obligatorio.',
            'paginas.integer'           => 'El número de páginas debe ser un número entero.',
            'paginas.min'               => 'El libro debe tener al menos 1 página.',
            'editorial.required'        => 'La editorial es obligatoria.',
            'editorial.max'             => 'La editorial no debe superar los 100 caracteres.',
            'stock.required'            => 'El stock es obligatorio.',
            'stock.integer'             => 'El stock debe ser un número entero.',
            'stock.min'                 => 'El stock no puede ser un número negativo.',
        ];
    }
}
