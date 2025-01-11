<?php

namespace App\Http\Services\Slider;

use App\Models\Slider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SliderService
{
    public function insertSlider($request){
        try{
            Slider::create($request->input());
            Session::flash('success', 'Add new slider successfull');
        } catch (\Exception $err){
            Session::flash('error', 'Add new slider failed');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }

    public function getSlider(){
        return Slider::orderByDesc('id')->paginate(10);
    }

    public function updateSlider($request, $slider)
    {
        try {
            $slider->fill($request->input());
            $slider->save();
            Session::flash('success', 'Update Slider successful');
        } catch (\Exception $err) {
            Session::flash('error', 'Update slider fail');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }
    public function destroySlider($request)
    {
        $slider = Slider::where('id', $request->input('id'))->first();
        if ($slider) {
            $path = str_replace('storage', 'public', $slider->thumb);
            Storage::delete($path);
            $slider->delete();
            return true;
        }

        return false;
    }

    public function showSlider()
    {
        return Slider::where('active', 1)->orderByDesc('sort_by')->get();
    }
}




