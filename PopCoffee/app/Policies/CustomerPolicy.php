<?php

namespace App\Policies;

use App\Models\User;
use App\Models\customer;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomerPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }

    public function view_customer(User $user)
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

    public function create_customer(User $user)
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
  
    public function update_customer(User $user)
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

    public function delete_customer(User $user){
        return in_array($user->email, [
            'azril@admin.com',
            'kelvin@admin.com',
            'fadhil@admin.com',
            'naufal@admin.com',
            'nizar@admin.com',
            'redho@admin.com'
        ]);
    }

    public function restore(User $user, customer $customer)
    {
        //
    }

    public function forceDelete(User $user, customer $customer)
    {
        //
    }
}
