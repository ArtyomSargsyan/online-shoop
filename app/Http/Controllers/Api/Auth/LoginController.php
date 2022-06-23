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

        $user = $this->UserRepository->login($request['email'], $request['password']);
        if (!$user || !Hash::check($request['password'], $user->password)) {
            return response((['message' => 'Invalided created']), 401);
        } else {
            $token = $user->createToken('fundaProjectTokenLogin')->plainTextToken;

            return response(new AuthResource($user, $token));
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
