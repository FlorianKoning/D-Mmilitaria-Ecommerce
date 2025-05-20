<?php

namespace App\Interfaces;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

interface CartServiceInterface
{
    public function add(Product $product): bool;
    public function update(Product $product, int $amount): void;
    public function count(): int;
    public function get(int $userId);
    public function destroy(Product $product): void;
    public function price(int $productId): array;
}
