<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class MenuController extends Controller
{
    public function create(){
        return view('admin.menu.add', [
            'title' => 'Add New Category'
        ]);
    }
}
