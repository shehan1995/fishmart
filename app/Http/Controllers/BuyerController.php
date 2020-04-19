<?php

namespace App\Http\Controllers;

use App\Models\BuyingAD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function createAdd(){
        $fish =DB::table('fish')->get();
        dump($fish);
        return view('dashboard/buyer/buyerAdd',compact('fish'));
    }

    public function postCreateAdd(Request $request){
        try {
            $user = auth()->user();

            $data = $request->all();
            $data['users_id'] = $user->id;
            $data['status'] = 'pending';
            dump($data);

            $TotalFish = DB::table('fish')->where('id', $data['fish_id'])->first();


            BuyingAD::create($data);


            return Redirect::to("/dashboard")->withSuccess('Great! You have Successfully loggedin');
        } catch (\Exception $e) {

            return $e->getMessage();
        }


    }

    public function viewSellingAdds(){
        $sellingAdds = DB::table('selling_a_d_s')->where('status','pending')->get();
        foreach ($sellingAdds as $sellingAdd){
            $fishName=DB::table('fish')->where('id',$sellingAdd->fish_id)->first();
            $sellingAdd->fish_name = $fishName->name;
        }
        dump($sellingAdds);
       return view('dashboard/buyer/viewSellingAdds',compact('sellingAdds'));
    }

    public function setOrder($sellingId){
        $sellingAdd = DB::table('selling_a_d_s')->where('id',$sellingId)->first();
        $fishName=DB::table('fish')->where('id',$sellingAdd->fish_id)->first();
        $sellingAdd->fish_name = $fishName->name;
        dump($sellingAdd);
        return view('dashboard/buyer/setOrder',compact('sellingAdd'));

    }
}
