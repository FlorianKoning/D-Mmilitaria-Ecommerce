<?php

namespace App\Repositories;

use Exception;
use App\Models\Cart;
use App\Interfaces\CartRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CartRepository implements CartRepositoryInterface
{
    public function userId(int $userId): Collection
    {
        $cart = Cart::leftJoin('products', 'carts.product_id', '=', 'products.id')
        ->where('user_id', $userId)
        ->get();

        return $cart;
    }
}
