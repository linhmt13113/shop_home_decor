<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Menu\CreateFormRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Menu\MenuService;
use App\Models\Menu;
class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService){
        $this->menuService = $menuService;
    }


    public function create_menu(){
        return view('admin.menu.add', [
            'title' => 'Add New Category',
            'menus' =>  $this->menuService->getParent()
        ]);
    }

    public function store_menu(CreateFormRequest $request) {
        $result = $this->menuService->createAdMenu($request);

        return redirect()->back();

    }

    public function index()  {
        return view('admin.menu.list', [
            'title' => 'Latest Category List',
            'menus' => $this->menuService->getAll()
        ]);
    }

    public function show_menu(Menu $menu){
        return view('admin.menu.edit', [
            'title' => 'Edit Category: ' . $menu->name ,
            'menu' => $menu,
            'menus' => $this->menuService->getParent()
        ]);
    }

    public function update_menu(Menu $menu, CreateFormRequest $request)  {
        $this->menuService->updateAdMenu($request, $menu);

        return redirect('/admin/menus/list');
    }

    public function destroy_menu(Request $request)  {
        $result = $this->menuService->destroy($request);
        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Deleted successfully'
            ]);
        }
        return response()->json([
            'error' => true,
        ]);
    }
}
