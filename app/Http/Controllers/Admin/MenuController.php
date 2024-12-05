<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Menu\CreateFormRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Menu\MenuService;
class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService){
        $this->menuService = $menuService;
    }


    public function create(){
        return view('admin.menu.add', [
            'title' => 'Add New Category',
            'menus' =>  $this->menuService->getParent()
        ]);
    }

    public function store(CreateFormRequest $request) {
        $result = $this->menuService->create($request);

        return redirect()->back();

    }

    public function index()  {
        return view('admin.menu.list', [
            'title' => 'Latest Category List',
            'menus' => $this->menuService->getAll()
        ]);
    }

    public function destroy(Request $request)  {
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
