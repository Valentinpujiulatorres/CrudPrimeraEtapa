<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Contacto;

class ContactoPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if($user->role === 'admin'){
            return true;
        }
    }
    public function viewAny(User $user)
    {
        if($user->role === 'usuario'){
            return true;
        }
    }

    public function view(User $user): bool
    {
        if($user->role === 'usuario' ){
            return true;
        }
    }

    public function create(User $user): bool
    {
        if($user->role === 'usuario'){
            return true;
        } else {
            return false;
        }
    }

    public function update(User $user)
    {
        if($user->role === 'admin'){
            return true;
        } 
    }

    public function delete(User $user)
    {
        if($user->role === 'admin'){
            return true;
        }
    }

    public function restore(User $user)
    {
        if($user->role === 'usuario' ){
            return true;
        }
    }

    public function forceDelete(User $user)
    {
        if($user->user_role === 'admin'){
            return true;
        }
    }
} 
