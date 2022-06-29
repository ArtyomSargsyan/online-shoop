<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\AuthResource;
use App\Repositories\Auth\UserRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

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
     * @return Application|ResponseFactory|Response
     */
    public function store(RegisterRequest $request)
    {

        $user = $this->userRepository->store($request->name, $request->email, $request->password);
        $token = $user->createToken('fundaProjectToken')->plainTextToken;

        return response(new AuthResource($token, $user), 201);
    }
}
