<?php

namespace App\Http\Services\Slider;

use App\Models\Slider;
use Log;
use Session;

class SliderService
{
    public function insert($request){
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

    public function get(){
        return Slider::orderByDesc('id')->paginate(15);
    }
}




