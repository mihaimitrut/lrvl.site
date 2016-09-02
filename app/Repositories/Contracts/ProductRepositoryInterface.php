<?php

namespace App\Repositories\Contracts;

use App\Models\Product;

interface ProductRepositoryInterface
{
    public function find($id);

    public function findBy($att, $column);

    public function getCategories();
}

?>