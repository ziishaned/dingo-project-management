<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{

    use Authenticatable, CanResetPassword;

    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Finds the user by email
     * @param  string $email Email of the user
     * @return User
     */
    public function findByEmail($email) 
    {
        return $this->where('email', $email)->first();
    }

    public function createUserAccount($input)
    {
        $this->create([
            'name'     => $input->get('name'),
            'email'    => $input->get('email'),
            'password' => \Hash::make($input->get('password')),
        ]);
        return true;
    }
}
