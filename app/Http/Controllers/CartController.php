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

    public function show_Cart()
    {
        $products = $this->cartService->getOfProduct();

        return view('carts.list', [
            'title' => 'Cart',
            'products' => $products,
            'carts' => Session::get('carts' , [])
        ]);
    }

    public function update_Cart(Request $request)
    {
        $this->cartService->update($request);

        return redirect('/carts');
    }

    public function remove_Cart($id = 0)
    {
        $this->cartService->remove($id);

        return redirect('/carts');
    }

    public function addCart(Request $request)
    {
        $this->cartService->addCart($request);

        return redirect()->back();
    }
}
