<?php

namespace App\Http\Services\Menu;
use App\Models\Menu;
use Str;
use Illuminate\Support\Facades\Session;

class MenuService
{
    // public function get($parent_id = 1)
    // {
    //     return Menu::
    //         when($parent_id == 0, function ($query) use ($parent_id) {
    //             $query->where('parent_id', $parent_id);
    //         })
    //         ->get();
    // }

    public function getParent()
    {
        return Menu::where('parent_id', 0)->get();
    }

    public function getAll()
    {
        return Menu::orderByDesc('id')->paginate(20);
    }


    public function create($request)
    {
        try {
            Menu::create([
                'name' => (string) $request->input('name'),
                'parent_id' => (int) $request->input('parent_id'),
                'description' => (string) $request->input('description'),
                'content' => (string) $request->input('content'),
                'active' => (string) $request->input('active'),
            ]);

            Session::flash('success', 'Created a successful category');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }

    public function update($request, $menu)
    {

        if ($request->input('parent_id') != $menu->id) {
            $menu->parent_id = (int) $request->input('parent_id');
        }

        $menu->name = (string) $request->input('name');
        $menu->description = (string) $request->input('description');
        $menu->content = (string) $request->input('content');
        $menu->active = (string) $request->input('active');
        $menu->save();

        Session::flash('success', 'Updated a successful category');
        return true;
    }

    public function destroy($request)
    {
        $id = (int) $request->input('id');
        $menu = Menu::where('id', $id)->first();
        if ($menu) {
            return Menu::where('id', $id)->orWhere('parent_id', $id)->delete();
        }
        return false;
    }

    public function show()
    {
        return Menu::select('name', 'id')->where('parent_id', 0)->orderByDesc('id')->get();
    }

    public function getId($id)
    {
        return Menu::where('id', $id)->where('active', 1)->firstOrFail();
    }

    public function getProduct($menu, $request)
    {
        $query = $menu->products()
            ->select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1);

        if ($request->has('price_min') && $request->has('price_max')) {
            $priceMin = $request->input('price_min');
            $priceMax = $request->input('price_max');

            // Lọc sản phẩm có giá (hoặc giá sale) trong phạm vi price_min và price_max
            $query->where(function ($query) use ($priceMin, $priceMax) {
                $query->whereBetween('price', [$priceMin, $priceMax])
                    ->orWhereBetween('price_sale', [$priceMin, $priceMax])
                    ->orWhere(function ($query) use ($priceMin, $priceMax) {
                        // Lọc sản phẩm khi giá sale và giá gốc đều nằm trong phạm vi giá
                        $query->where('price', '>=', $priceMin)
                            ->where('price', '<=', $priceMax)
                            ->where('price_sale', '>=', $priceMin)
                            ->where('price_sale', '<=', $priceMax);
                    });
            });
        }

        if ($request->input('price')) {
            // $query->orderBy('price', $request->input('price'));
            $query->orderByRaw("COALESCE(price_sale, price) {$request->input('price')}");
        }

        return $query
            ->orderByDesc('id')
            ->paginate(12)
            ->withQueryString();
    }
}
