<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TareaUpdate extends FormRequest
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
            'titulo' => ['required'],
            'descripcion' => ['nullable'],
            'fecha_creacion' => ['required', 'date'],
            'fecha_finalizacion' => ['nullable', 'date'],
            'estado' => ['in:pendiente,progreso,completado']
        ];
    }
}
