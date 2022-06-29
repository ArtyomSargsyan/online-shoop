<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    /**
     * @var string
     */
    private string $token;

    /**
     * @var object
     */
    private object $user;

    /**
     * @param string $token
     * @param object $user
     */
    public function __construct(string $token, object $user)
    {
        $this->token = $token;
        $this->user = $user;
    }

    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'user' => new UserResource($this->user),
            'token' => $this->token
        ];
    }

}
