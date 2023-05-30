<?php

namespace App\Policies;

use App\Models\User;
use App\Models\coffee;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoffeePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }

    public function view_coffee(User $user)
    {
        //
        return in_array($user->email, [
            'azril@admin.com',
            'kelvin@admin.com',
            'fadhil@admin.com',
            'naufal@admin.com',
            'nizar@admin.com',
            'redho@admin.com'
        ]);
    }

    public function create_coffee(User $user)
    {
        //
        return in_array($user->email, [
            'azril@admin.com',
            'kelvin@admin.com',
            'fadhil@admin.com',
            'naufal@admin.com',
            'nizar@admin.com',
            'redho@admin.com'
        ]);
    }

    public function update_coffee(User $user)
    {

        return in_array($user->email, [
            'azril@admin.com',
            'kelvin@admin.com',
            'fadhil@admin.com',
            'naufal@admin.com',
            'nizar@admin.com',
            'redho@admin.com'

        ]);
    }

    public function delete_coffee(User $user){
        return in_array($user->email, [
            'azril@admin.com',
            'kelvin@admin.com',
            'fadhil@admin.com',
            'naufal@admin.com',
            'nizar@admin.com',
            'redho@admin.com'
        ]);
    }

    public function restore(User $user, coffee $coffee)
    {
        //
    }

    public function forceDelete(User $user, coffee $coffee)
    {
        //
    }
}
