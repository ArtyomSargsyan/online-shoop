<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{

    /**
     * @var object
     */
    private object  $user;

    /**
     * @param object $user
     */
    public function __construct( object $user)
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
            'name' => $this->user->name,
            'email'  => $this->user->email,
            'created at' => $this->user->created_at
        ];
    }

}
