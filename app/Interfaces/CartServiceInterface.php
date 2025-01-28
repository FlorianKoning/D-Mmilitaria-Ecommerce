<?php

namespace App\Interfaces;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

interface CartServiceInterface
{
    public static function add(Product $product): bool;
    public static function update(Product $product, int $amount): void;
    public static function count(): int;
    public static function get(int $userId);
    public static function destroy(Product $product): void;
    public static function price(int $productId): array;
}
