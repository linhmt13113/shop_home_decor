<?php

namespace App\Http\Services\Menu;
use App\Models\Menu;
use Str;
use Illuminate\Support\Facades\Session;

class MenuService
{

    // Get parent menus
    public function getParent()
    {
        return Menu::where('parent_id', 0)->get();
    }

    // Get category IDs based on parent ID
    public function getCategoryIds($parentId)
    {
        $ids = Menu::where('id', $parentId)
            ->orWhere('parent_id', $parentId)
            ->pluck('id')
            ->toArray();

        return $ids;
    }

    // Get all menus with pagination
    public function getAll()
    {
        return Menu::orderByDesc('id')->paginate(20);
    }

    // Create a new menu
    public function createAdMenu($request)
    {
        try {
            $menuData = [
                'name' => (string) $request->input('name'),
                'parent_id' => (int) $request->input('parent_id'),
                'description' => (string) $request->input('description'),
                'content' => (string) $request->input('content'),
                'active' => (string) $request->input('active'),
            ];

            Menu::create($menuData);

            Session::flash('success', 'Created a successful category');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }

    // Update an existing menu
    public function updateAdMenu($request, $menu)
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

    // Delete a menu
    public function destroy($request)
    {
        $id = (int) $request->input('id');
        $menu = Menu::where('id', $id)->first();
        if ($menu) {
            Menu::where('id', $id)->orWhere('parent_id', $id)->delete();
            return true;
        }
        return false;
    }

    // Get top-level menus (parent menus)
    public function showMenu()
    {
        return Menu::select('name', 'id')
            ->where('parent_id', 0)
            ->orderByDesc('id')
            ->get();
    }

    public function getId($id)
    {
        return Menu::where('id', $id)
            ->where('active', 1)
            ->firstOrFail();
    }


    public function getOfProduct($categoryIds, $request)
    {
        $query = \App\Models\Product::whereIn('menu_id', $categoryIds)
            ->select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1);

        if ($request->has('price_min') && $request->has('price_max')) {
            $priceMin = $request->input('price_min');
            $priceMax = $request->input('price_max');

            $query->where(function ($query) use ($priceMin, $priceMax) {
                $query->whereBetween('price', [$priceMin, $priceMax])
                    ->orWhereBetween('price_sale', [$priceMin, $priceMax])
                    ->orWhere(function ($query) use ($priceMin, $priceMax) {
                        $query->where('price', '>=', $priceMin)
                            ->where('price', '<=', $priceMax)
                            ->where('price_sale', '>=', $priceMin)
                            ->where('price_sale', '<=', $priceMax);
                    });
            });
        }

        if ($request->input('price')) {
            $query->orderByRaw("COALESCE(price_sale, price) {$request->input('price')}");
        }

        return $query
            ->orderByDesc('id')
            ->paginate(12)
            ->withQueryString();
    }
}
