<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Product\ProductService;
use App\Models\Product;

class ProductController extends Controller
{
    protected $productService;
    function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    function index($id = "", $slug = "")
    {
        $product = $this->productService->showProd($id);
        $productsMore = $this->productService->moreProd($id);
        return view('products.content', [
            'title' => $product->name,
            'product' => $product,
            'products' => $productsMore
        ]);
    }

    public function search_Product(Request $request)
    {
        $search = $request->input('search');
        $products = $this->productService->searchProducts($search);
        $products = $products->unique('id');
        return view('products.search_results', [
            'title' => $search,
            'products' => $products
        ]);
    }
}
