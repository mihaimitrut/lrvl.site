<?php

namespace App\Http\Controllers;

use App\Models\Product;

use App\Http\Requests;

use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    protected $product;

    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }
    public function index() {
        return view('index', ['products' => Product::inRandomOrder()->limit(12)->get()->toArray(),
            'categories' => $this->product->getCategories()->toArray()
        ]);
    }
    public function show($category_slug, $title_slug)
    {
        return view('show', ['product' => Product::where('title_slug', $title_slug)->where('category_slug', $category_slug)->get()->first()->toArray(),
                'categories' => $this->product->getCategories()->toArray()
            ]);
    }
    public function listCategoryProducts($category_slug) {
        return view('listCategoryProducts', ['products' => Product::where('category_slug', $category_slug)->paginate(6),
                'categories' => $this->product->getCategories()->toArray()
            ]);
    }
}
