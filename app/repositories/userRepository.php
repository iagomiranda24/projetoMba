<?php

namespace App\repositories;

use App\models\User;


class userRepository
{

    protected $user;

    public function __construct(User $user)
    {

        $this->user = $user;

    }

    public function modelUser () {

        return $this->user;
    }
}