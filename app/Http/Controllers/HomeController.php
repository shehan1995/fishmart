<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $data = array();
            $sellingAdds = DB::table('selling_a_d_s')->where('status','pending')->orderBy('created_at','desc')->limit(5)->get();
            $buyingAdds = DB::table('buying_a_d_s')->where('status','pending')->orderBy('created_at','desc')->limit(5)->get();
            $data['sellingAdds'] = $sellingAdds;
            $data['buyingAdds'] = $buyingAdds;
            dump($data);
            return view('index',compact($data));
        }catch (\Exception $e){

        }

    }  
}
