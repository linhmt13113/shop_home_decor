<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Services\CartService;

class CartController extends Controller
{
    protected $cart;
    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        return view('admin.carts.customer', [
            'title' => 'List of Orders',
            'customers' => $this->cart->getOfCustomer()
        ]);
    }

    public function show_cart(Customer $customer)
    {
        $carts = $this->cart->getProductOfCart($customer);

        return view('admin.carts.detail', [
            'title' => 'Order Details: ' . $customer->name,
            'customer' => $customer,
            'carts' => $carts
        ]);
    }

    public function destroy_cart(Request $request)
    {
        $result = $this->cart->delete($request);
        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Cart deleted successfully '
            ]);
        }

        return response()->json([
            'error' => true,
        ]);
    }
}
