<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function viewAny(): bool
    {
        return true;
    }

    public function view(): bool
    {
        return true;
    }

    public function create(): bool
    {
        return true;
    }

    public function update(User $user, Product $product): bool
    {
        return $product->user_id == $user->id;
    }

    public function delete(User $user, Product $product): bool
    {
        return $product->user_id == $user->id;
    }
}
