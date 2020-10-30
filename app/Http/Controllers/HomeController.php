<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $fishes= DB::table('fish')->orderBy('created_at','desc')->get();
            $fishArr =[];
            $fishFinal=[];
            $count = 0;
            $totCount=0;
            foreach ($fishes as $fish){
                if (($count<2) && ($totCount+1< count($fishes))) {
                    array_push($fishArr, $fish);
                    $fish->image = "storage/{$fish->image}";
                    $count = $count + 1;

                }else{
                    $fish->image = "storage/{$fish->image}";
                    array_push($fishArr,$fish);
                    array_push($fishFinal,$fishArr);
                    $fishArr=[];
                    $count=0;
                }
                $totCount=$totCount+1;
            }
            $data['main'] = $fishFinal;

            $fishes= DB::table('fish')->orderBy('amount','desc')->get();
            $fishArr =[];
            $fishFinal=[];
            $count = 0;
            $totCount=0;
            foreach ($fishes as $fish){
                if (($count<2) && ($totCount+1< count($fishes))) {
                    array_push($fishArr, $fish);
                    $fish->image = "storage/{$fish->image}";
                    $count = $count + 1;

                }else{
                    $fish->image = "storage/{$fish->image}";
                    array_push($fishArr,$fish);
                    array_push($fishFinal,$fishArr);
                    $fishArr=[];
                    $count=0;
                }
                $totCount=$totCount+1;
            }
            $data['hot'] = $fishFinal;
            return view('index',compact('data'));
        }catch (\Exception $e){
            dump($e);
        }

    }

    public function about(){
        return view('about');
    }

    public function store(){
        $fishes= DB::table('fish')->orderBy('created_at','desc')->get();
        $fishArr =[];
        $fishFinal=[];
        $count = 0;
        $totCount=0;
        foreach ($fishes as $fish){
            if (($count<2) && ($totCount+1< count($fishes))) {
                array_push($fishArr, $fish);
                $fish->image = "storage/{$fish->image}";
                $count = $count + 1;

            }else{
                $fish->image = "storage/{$fish->image}";
                array_push($fishArr,$fish);
                array_push($fishFinal,$fishArr);
                $fishArr=[];
                $count=0;
            }
            $totCount=$totCount+1;
        }
//        foreach ($fishes as $fish){
//            if (($count<3) && ($totCount+1< count($fishes))) {
//                array_push($fishArr, $fish);
//                $count = $count + 1;
//            }elseif ($totCount+1== count($fishes)){
//                array_push($fishArr,$fish);
//                array_push($fishFinal,$fishArr);
//            }else{
//                array_push($fishFinal,$fishArr);
//                $fishArr=[];
//                $count=1;
//                array_push($fishArr,$fish);
//            }
//            dump($totCount);
//            $totCount=$totCount+1;
//        }
        $data = $fishFinal;
        return view('store',compact('data'));
    }
}
