<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use Illuminate\Http\Request;
use App\Http\Services\Product\ProductAdminService;
use App\Models\Product;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductAdminService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return view('admin.product.list',[
            'title' => 'Product List',
            'products' => $this->productService->getProdAd()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_product()
    {
        return view('admin.product.add', [
            'title' => 'Add New Product',
            'menus' => $this->productService->getMenu()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_product(ProductRequest $request)
    {

        $this->productService->insertProdAd($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show_product(Product $product)
    {
        return view('admin.product.edit', [
            'title' => 'Edit Product',
            'product' => $product,
            'menus' => $this->productService->getMenu()
        ]);
    }


    public function update_product(Request $request, Product $product)
    {
        $result = $this->productService->updateProdAd($request, $product);
        if($result){
            return redirect('/admin/products/list');
        }

        return redirect()->back();
    }

    public function destroy_product(Request $request)
    {
        $result = $this->productService->deleteProdAd($request);
        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Product deleted successfully '
            ]);
        }

        return response()->json([
            'error' => true,
        ]);
    }
}
