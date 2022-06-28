<?php

namespace App\Repositories\Product;


use App\Models\Product;

class ProductRepository
{
    /**
     * @param string $name
     * @param string $displayName
     * @param int $price
     * @param string $description
     * @param int $userId
     * @return mixed
     */
    public function store(string $name, string $displayName, int $price, string $description, int $userId)
    {
        return Product::create([
            'name' => $name,
            'display_name' => $displayName,
            'price' => $price,
            'description' => $description,
            'user_id' => $userId
        ]);
    }
}