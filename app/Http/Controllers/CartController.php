<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CartService;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cartService;
    function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    function index(Request $request)
    {
        $result = $this->cartService->create($request);
        if ($result === false) {
            return redirect()->back();
        }

        return redirect('/carts');
    }

    public function show()
    {
        $products = $this->cartService->getProduct();

        return view('carts.list', [
            'title' => 'Cart',
            'products' => $products,
            'carts' => Session::get('carts')
        ]);
    }

    function update(Request $request)
    {
        $this->cartService->update($request);

        return redirect('/carts');
    }
}
