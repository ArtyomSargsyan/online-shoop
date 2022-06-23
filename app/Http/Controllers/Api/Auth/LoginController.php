<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\AuthResource;
use App\Repositories\Auth\UserRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * @var UserRepository
     */
    protected UserRepository $UserRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->UserRepository = $userRepository;
    }

    /**
     * @param LoginRequest $request
     * @return Application|ResponseFactory|Response
     */
    public function login(LoginRequest $request)
    {

        $loginRepository = $this->UserRepository->login($request['email'], $request['password']);
        if (!$loginRepository || !Hash::check($request['password'], $loginRepository->password)) {
            return response((['message' => 'Invalided created']), 401);
        } else {
            $token = $loginRepository->createToken('fundaProjectTokenLogin')->plainTextToken;

            return response(new AuthResource($loginRepository, $token));
        }
    }

    /**
     * @return Application|ResponseFactory|Response
     */
    public function logout()
    {
        auth('sanctum')->user()->tokens()->delete();

        return response(['message' => 'logout successfully']);
    }
}
