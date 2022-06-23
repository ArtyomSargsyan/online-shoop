<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * @return Application|ResponseFactory|Response
     */
    public function index()
    {
        $user = Auth::user();

        return response(new UserResource($user));

    }
}
