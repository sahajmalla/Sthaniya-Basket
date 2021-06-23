<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
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

        Validator::make($input, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'dob' => ['required'],
            'gender' => ['required'],
            'userType'=>['required'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
                'password' => $this->passwordRules(),
            ])->validate();

        if(!(isset($input['subscription']))){
            $input['subscription']='off';
        }

        if($input['userType']=='customer'){

            return User::create([
                'firstname' => $input['firstname'],
                'username' => $input['username'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'lastname' => $input['lastname'],
                'dob' => $input['dob'],
                'gender' => $input['gender'],
                'address' => $input['address'],
                'subscription' => $input['subscription'],
                'user_image' => 'images/userpp.png',
                'user_type' => $input['userType'],
            ]);

        }else{

            Validator::make($input, [
                'firstname' => ['required', 'string', 'max:255'],
                'lastname' => ['required', 'string', 'max:255'],
                'username' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string', 'max:255'],
                'dob' => ['required'],
                'gender' => ['required'],
                'business'=>['required'],
                'shopname'=>['required'],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique(User::class),
                ],
                'password' => $this->passwordRules(),
            ])->validate();

            return User::create([
                'firstname' => $input['firstname'],
                'username' => $input['username'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'lastname' => $input['lastname'],
                'dob' => $input['dob'],
                'gender' => $input['gender'],
                'address' => $input['address'],
                'shop' => $input['shopname'],
                'business' => $input['business'],
                'user_image' => 'images/userpp.png',
                'user_type' => $input['userType'],
            ]);
        }
    }
}
