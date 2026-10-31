<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AutorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $autorId = $this->route('autore') ?? $this->route('autor');

        return [
            'nombres'          => 'required|string|max:100',
            'nacionalidad'     => 'required|string',
            'email'            => [
                'required',
                'email',
                Rule::unique('autores', 'email')->ignore($autorId)
            ],
            'fecha_nacimiento' => 'required|date|before:today',
            'biografia'        => 'nullable|string',
            'estado'           => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'nombres.required'          => 'El nombre del autor es obligatorio.',
            'nombres.max'               => 'El nombre no debe exceder los 100 caracteres.',
            'nacionalidad.required'     => 'La nacionalidad es obligatoria.',
            'email.required'            => 'El correo electrónico es obligatorio.',
            'email.email'               => 'Debe ingresar un correo electrónico válido.',
            'email.unique'              => 'Este correo electrónico ya está registrado.',
            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'fecha_nacimiento.date'     => 'La fecha de nacimiento debe ser una fecha válida (AAAA-MM-DD).',
            'fecha_nacimiento.before'   => 'La fecha de nacimiento debe ser anterior a hoy.',
        ];
    }
}
