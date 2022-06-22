<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Repositories\Auth\UserRepository;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * @var UserRepository
     */
    protected UserRepository $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
   {
       $this->userRepository = $userRepository;
   }

    /**
     * @param RegisterRequest $request
     * @return array
     */
   public function store(RegisterRequest $request): array
   {

     $storeRegister = $this->userRepository->store($request['name'], $request['email'], $request['password']);
     $token = $storeRegister->createToken('fundaProjectToken')->plainTextToken;
     return ['user' => $storeRegister, 'token' => $token];
   }
}
