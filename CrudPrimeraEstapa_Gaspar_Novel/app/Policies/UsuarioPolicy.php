<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsuarioPolicy
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
        if($user->role === 'usuario' || $user->role === 'invitado'){
            return true;
        }
    }

    public function view(User $user): bool
    {
        if($user->role === 'usuario' ){
            return true;
        } elseif ($user->role === 'invitado'){
            return true;
        }
    }

    public function create(User $user): bool
    {
        if($user->role === 'usuario'){
            return true;
        } elseif ($user->role === 'invitado'){
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
