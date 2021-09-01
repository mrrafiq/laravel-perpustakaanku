<?php

namespace App\Transformers;

use App\Models\User;

use League\Fractal\TransformerAbstract;

class UserTranformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        return[
            'name' => $user->name,
            'username' => $user->username,
            'password' => $user->password,

        ];
    }
}