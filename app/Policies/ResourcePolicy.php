<?php

namespace App\Policies;

use App\Models\Resource;
use App\Models\User;

class ResourcePolicy
{
    /**
     * Tentukan apakah user boleh melihat daftar resource.
     */
    public function viewAny(User $user)
    {
        return true; // Semua user yang login boleh lihat daftar miliknya
    }

    /**
     * Tentukan apakah user boleh melihat detail satu resource.
     */
    public function view(User $user, Resource $resource)
    {
        return $user->id === $resource->user_id;
    }

    /**
     * Tentukan apakah user boleh membuat resource baru.
     */
    public function create(User $user)
    {
        return true; // Semua user yang login boleh buat
    }

    /**
     * Tentukan apakah user boleh mengupdate resource.
     */
    public function update(User $user, Resource $resource)
    {
        return $user->id === $resource->user_id;
    }

    /**
     * Tentukan apakah user boleh menghapus resource.
     */
    public function delete(User $user, Resource $user)
    {
        return $user->id === $resource->user_id;
    }
}