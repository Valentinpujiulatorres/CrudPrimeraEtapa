<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsuarioPolicy
{
    use HandlesAuthorization;
    // funcion que comprueba si eres admin
    public function before(User $user)
    {
        if($user->role === 'admin'){
            return true;
        }
    }
    // funcion que permite ver a los usuarios 
    public function viewAny(User $user)
    {
        if($user->role === 'usuario' || $user->role === 'invitado'){
            return true;
        }
    }
    // funcion que permite ver a un usuario
    public function view(User $user): bool
    {
        if($user->role === 'usuario' ){
            return true;
        } elseif ($user->role === 'invitado'){
            return true;
        }
    }
    // funcion que permite crear un usuario si eres usuario o admin
    public function create(User $user): bool
    {
        if($user->role === 'usuario'){
            return true;
        } elseif ($user->role === 'invitado'){
            return false;
        }
    }
    // funcion que permite actualizar un usuario si eres admin
    public function update(User $user)
    {
        if($user->role === 'admin'){
            return true;
        } 
    }
    // funcion que permite eliminar un usuario si eres admin
    public function delete(User $user)
    {
        if($user->role === 'admin'){
            return true;
        }
    }
    // funcion que permite reiniciar si eres usuario
    public function restore(User $user)
    {
        if($user->role === 'usuario' ){
            return true;
        }
    }
    // funcion que permite rliminar un usuario si eres admin
    public function forceDelete(User $user)
    {
        if($user->user_role === 'admin'){
            return true;
        }
    }
}
