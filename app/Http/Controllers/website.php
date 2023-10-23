<?php

namespace App\Http\Controllers;

use App\Models\country;
use App\Models\city;
use App\Models\state;
use Illuminate\Http\Request;

class website extends Controller
{
    public function index(Request $request){
        $countries=country::orderBy('country', 'asc')->get();
        return view('index',compact('countries'));
    }

    public function getState(Request $request){
        $cid=$request->post('cid');
        $states=state::where('country',$cid)->orderBy('state', 'asc')->get();
        $html='<option value="">Select State</option>';
        foreach($states as $state){
            $html.='<option value="'.$state->id.'">'.$state->state.'</option>';
        }
        echo $html;
    }

    public function getCity(Request $request){
        $sid=$request->post('sid');
        $cities=city::where('state',$sid)->orderBy('city', 'asc')->get();
        $html='<option value="">Select City</option>';
        foreach($cities as $city){
            $html.='<option value="'.$city->id.'">'.$city->city.'</option>';
        }
        echo $html;
    }
}
