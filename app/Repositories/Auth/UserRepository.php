<?php
namespace App\Repositories\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Integer;

class UserRepository
{
    public function store(string $name, string $email, string $password)
    {

       return User::create([
          'name' => $name,
           'email' => $email,
           'password' =>Hash::make($password)
       ]);

    }

    public function login(string $email, string $password)
    {
       return  User::where('email',$email)->first();

    }

}