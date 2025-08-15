<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create yetkisi: Admin ise izin ver.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Update yetkisi: Admin ise izin ver.
     */
    public function update(User $user, User $model): bool
    {
        return $user->isAdmin();
    }

    /**
     * Delete yetkisi: Admin ise izin ver.
     */
    public function delete(User $user, User $model): bool
    {
        return $user->isAdmin();
    }
}
