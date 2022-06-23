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
     * @param $storeRegister
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
            'storeRegister' => new UserResource($this->user),
            'token' => $this->token
        ];
    }

    /**
     * @param $request
     * @return array
     */
    public function with($request): array
    {
        return [
            'versin' => '1.2.0',
            'post_url' => url('https://shoop.api.com')
        ];
    }
}
