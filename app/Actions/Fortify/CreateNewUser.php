<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'profile_photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ])->validate();

        $imageName= null;

        if(request()->hasFile('profile_photo') && request()->file('profile_photo')->isValid()){

            $requestImage = request() -> file('profile_photo');

            $extension = $requestImage -> extension();

            $imageName = md5($requestImage -> getClientOriginalName() . strtotime("now") . ".") . "." . $extension;

            //mover para pasta
            $requestImage -> move(public_path('img/users'), $imageName);

        }

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        $user -> profile_photo_path = $imageName;
        $user -> save();

        return $user;
    }
}
