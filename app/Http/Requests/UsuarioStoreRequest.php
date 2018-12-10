<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioStoreRequest extends FormRequest
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
           'name' => 'required|max:100|min:2',
           'email' => 'required|max:100|min:2|unique:users,email',
           'password' => 'required|max:100|min:2',
       ];
     }

     public function messages(){
       return [
           'name.required' => 'El nombre del usuario esta vacío.',
           'name.max' => 'El nombre del usuario no debe contener más de 100 caracteres.',
           'name.min' => 'El nombre del usuario debe contener al menos 2 caracteres.',
           'email.required' => 'El Username del usuario esta vacío.',
           'email.max' => 'El Username del usuario no debe contener más de 100 caracteres.',
           'email.min' => 'El Username del usuario debe contener al menos 2 caracteres.',
           'password.required' => 'La contraseña del usuario esta vacía.',
           'password.max' => 'La contraseña del usuario no debe contener más de 100 caracteres.',
           'password.min' => 'La contraseña del usuario debe contener al menos 2 caracteres.',
           'email.unique' => 'El Username ya está registrado.',
       ];
     }
}
