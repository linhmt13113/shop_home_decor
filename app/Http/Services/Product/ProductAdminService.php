<?php


namespace App\Http\Services\Product;


use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

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

    public function insertProdAd($request)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;

        try {
            $request->except('_token');
            Product::create($request->all());

            Session::flash('success', 'Add product successfully');
        } catch (\Exception $err) {
            Session::flash('error', 'Add product error');
            Log::info($err->getMessage());
            return  false;
        }

        return  true;
    }

    public function getProdAd(){
        return Product::with('menu')->orderByDesc('id')->paginate(15);

    }

    public function updateProdAd($request, $product)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;

        try {
            $product->fill($request->input());
            $product->save();
            Session::flash('success', 'Update successful');
        } catch (\Exception $err) {
            Session::flash('error', 'Error please try again');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function deleteProdAd($request)
    {
        $product = Product::where('id', $request->input('id'))->first();
        if ($product) {
            $product->delete();
            return true;
        }

        return false;
    }
}
