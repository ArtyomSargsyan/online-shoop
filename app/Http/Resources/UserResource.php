<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{

    /**
     * @var string
     */
    private string $user;

    /**
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }


    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'user' => $this->user,
        ];
    }

}
