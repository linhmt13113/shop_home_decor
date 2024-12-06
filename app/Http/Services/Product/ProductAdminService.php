<?php


namespace App\Http\Services\Product;


use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductAdminService
{
    public function getMenu()
    {
        return Menu::where('active', 1)->get();
    }

    protected function isValidPrice($request)
    {
        if (
            $request->input('price') != 0 && $request->input('price_sale') != 0
            && $request->input('price_sale') >= $request->input('price')
        ) {
            Session::flash('error', 'Discount price must be less than original price');
            return false;
        }

        if ($request->input('price_sale') != 0 && (int) $request->input('price') == 0) {
            Session::flash('error', 'Please Input original price');
            return false;
        }

        return true;
    }

    public function insert($request)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;

        try {
            $request->except('_token');
            Product::create($request->all());

            Session::flash('success', 'Add product successfully');
        } catch (\Exception $err) {
            Session::flash('error', 'Add product error');
            \Log::info($err->getMessage());
            return  false;
        }

        return  true;
    }
}
