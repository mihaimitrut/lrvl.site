<?php

namespace App\Repositories;

use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{

    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function find($id)
    {
        return $this->product->find($id);
    }

    public function findBy($att, $column)
    {
        return $this->product->where($att, $column)->get();
    }
    public function getCategories() {
        return $this->product->orderBy('category','asc')->groupBy('category', 'category_slug')->select('category', 'category_slug')->get();
    }
}

?>