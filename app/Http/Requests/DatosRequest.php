<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DatosRequest extends FormRequest
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
           'rut_empresa' => 'required|max:100|min:1',
           'dv' => 'required|max:100|min:1',
           'cod_empresa' => 'required|max:100|min:1',
           'region' => 'required|max:100|min:1',
           
       ];
     }

     public function messages(){
       return [
           'rut_empresa.required' => 'El rut de la empresa esta vacío.',
           'rut_empresa.max' => 'El rut de la empresa no debe contener más de 100 caracteres.',
           'rut_empresa.min' => 'El rut de la empresa debe contener al menos 1 caracter.',
           'dv.required' => 'El Dv esta vacío.',
           'dv.max' => 'El Dv no debe contener más de 100 caracteres.',
           'dv.min' => 'El Dv debe contener al menos 1 caracter.',
           'cod_empresa.required' => 'El codigo de la empresa esta vacío.',
           'cod_empresa.max' => 'El codigo de la empresa no debe contener más de 100 caracteres.',
           'cod_empresa.min' => 'El codigo de la empresa debe contener al menos 1 caracter.',
           'region.required' => 'La region esta vacía.',
           'region.max' => 'La region no debe contener más de 100 caracteres.',
           'region.min' => 'La region debe contener al menos 1 caracter.',
       ];
     }
}
