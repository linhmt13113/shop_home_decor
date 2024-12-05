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

    public function getParent(){
        return Menu::where('parent_id', 0)->get();
    }

    public function getAll(){
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

            Session::flash('success', 'Create a successful category');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }
}