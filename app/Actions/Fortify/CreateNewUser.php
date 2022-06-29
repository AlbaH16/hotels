<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {

        Validator::extend('olderThan', function($attribute, $value,$parameters){
            $minAge = ( ! empty($parameters)) ? (int) $parameters[0] : 13;
            return Carbon::now()->diff(new Carbon($value))->y >= $minAge;
        },'Debes tener al menos 18 años para registrarte');

        Validator::make($input, [
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'gender'=>[
                'required',
                'in:Mujer,Hombre,Otro'],
            'birth_date'=>[
                'required',
                'date',
                'olderThan:18'
            ],
            'relationship_status'=>[
                'required',
                'in:Soltero,En pareja,Es complicado'
            ],
        ],
        [
            'email.required' => 'Es necesario un email para aperturar la cuenta',
            'email.unique' => 'Ya se ha registrado este correo electrónico',
            'password.required'=>'Introduce una contraseña para iniciar sesión',
            'password.confirmed'=>'Las contraseñas no coinciden',
            'gender.required'=>'Selecciona una opción de género',
            'birth_date.required' => 'Introduce tu fecha de nacimiento',
            'birth_date.olderThan' => 'Debes tener al menos 18 años',
            'relationship_status.required' => 'Selecciona tu estatus sentimental'
        ]
        )->validate();

        return User::create([
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'gender' => $input['gender'],
            'birth_date' => $input['birth_date'],
            'relationship_status' => $input['relationship_status']
        ]);
    }
}
