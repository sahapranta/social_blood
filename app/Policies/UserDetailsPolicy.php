<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserDetailsPolicy
{
    use HandlesAuthorization;
    
    public function go(User $user){
        return $user->userDetails? true : false;
    }
}
