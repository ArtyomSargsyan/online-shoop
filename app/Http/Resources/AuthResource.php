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
     * @var string
     */
    private string $user;

    /**
     * @param $token
     * @param $user
     */
    public function __construct($token, $user)
    {
        $this->token = $token;
        $this->user = $user;
    }


    /**
     * @param $request
     * @return string[]
     */
    public function toArray($request): array
    {
        return [
            'user' => new UserResource($this->user),
            'token' => $this->token
        ];
    }

}
