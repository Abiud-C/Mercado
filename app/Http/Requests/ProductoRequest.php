<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            //
            'Nombre'=>'required|string',
            'Descripcion'=>'required|string',
            'Caracteristicas' =>'required|string',
            'foto'=>'required',
            'Descripcion_foto'=> 'required|string',
            'Categoriaid' => 'required|integer',
            'Garantia'=>'required|string',
            'Precio'=>'required|numeric',
            'Cantidad'=>'required|integer',
            'Descripcion_foto' => 'required|string',
            
        ];
    }

    public function messages()
    {
      return [
            //
            'Nombre.required'=>'El :attribute es obligatorio.',
            'Nombre.string'=>'El :attribute debe ser una cadena.',

            'Caracteristicas.required'=>'La :attribute es obligatorio.',
            'Caracteristicas.string'=>'El campo :attribute debe ser una cadena.',

            'Descripcion.required'=>'La :attribute es obligatorio.',
            'Descripcion.string'=>'El campo :attribute debe ser una cadena.',

            'Garantia.required'=>'La :attribute es obligatorio.',
            'Garantia.string'=>'El campo :attribute debe ser una cadena.',

            'Cantidad.required'=>'La :attribute es obligatorio.',
            'Cantidad.integer'=>'El campo :attribute no acepta decimales.',

            'Precio.required'=>'El :attribute es obligatorio.',
            'Precio.numeric'=>'El campo :attribute no acepta letras o caracteres especiales.',

            'foto.required'=>'La :attribute es obligatoria.',

            'Descripcion_foto.required'=>'La descripción es requerida.'
      ];
    }
}
