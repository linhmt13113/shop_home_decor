<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;



class SliderController extends Controller
{
    protected $slider;
    public function __construct(SliderService $slider){
        $this->slider = $slider;
    }
    public function create_slider(){
        return view('admin.slider.add', [
            "title" => 'Add new slider',

        ]);
    }

    public function store_slider(Request $request){
        $request->validate( [
            'name' => 'required',
            'thumb' => 'required',
            'url' => 'required'

        ]);

        $this->slider->insertSlider($request);

        return redirect()->back();
    }

    public function index(){
        return view('admin.slider.list', [
            "title" => 'Lastest Slider list',
            'sliders' => $this->slider->getSlider()
        ]);
    }
    public function show_slider(Slider $slider)
    {
        return view('admin.slider.edit', [
            'title' => 'Edit Slider',
            'slider' => $slider
        ]);
    }

    public function update_slider(Request $request, Slider $slider)
    {
        $request->validate( [
            'name' => 'required',
            'thumb' => 'required',
            'url'   => 'required'
        ]);

        $result = $this->slider->updateSlider($request, $slider);
        if ($result) {
            return redirect('/admin/sliders/list');
        }

        return redirect()->back();
    }
    public function destroy_slider(Request $request)
    {
        $result = $this->slider->destroySlider($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Delete Slider successful'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }
}
