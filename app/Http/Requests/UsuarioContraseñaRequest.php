<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioContraseñaRequest extends FormRequest
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
            'password' => 'required|max:30|min:3',
        ];
    }

    public function messages(){
      return [
    'password.required' => 'La contraseña del usuario esta vacía.',
    'password.max' => 'La contraseña del usuario no debe contener más de 30 caracteres.',
    'password.min' => 'La contraseña del usuario debe contener al menos 3 caracteres.',
      ];
  }
}
