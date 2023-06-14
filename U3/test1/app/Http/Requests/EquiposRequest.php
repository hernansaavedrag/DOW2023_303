<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquiposRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nombre' => 'required|min:3|max:20|unique:equipos,nombre',
            'entrenador' => 'required|min:3|max:20'
        ];
    }

    public function messages(){
        return [
            'nombre.required' => 'Indique el nombre del equipo',
            'nombre.min' => 'Nombre del equipo debe tener como mínimo 3 letras',
            'nombre.max' => 'Nombre del equipo debe tener como máximo 20 letras',
            'nombre.unique' => 'Ya existe un equipo llamado :input',
            'entrenador.required' => 'Indique el entrenador',
            'entrenador.min' => 'Nombre del entrenador debe tener como mínimo 3 letras',
            'entrenador.max' => 'Nombre del entrenador debe tener como máximo 20 letras'
        ];

    }
}
