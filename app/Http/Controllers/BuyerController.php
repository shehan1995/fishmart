<?php

namespace App\Http\Controllers;

use App\Models\BuyingAD;
use App\Models\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
    public function editProfile(){
        $user = auth()->user();
        $userName = $user->name;
        return view('dashboard/buyer/buyerEditProfile',compact('user'),compact('userName'));
    }

    public function postEditProfile(Request $request){
        try {
            $user = auth()->user();
            request()->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            $show = User::findOrFail($user->id);
            $show->update($data);
        } catch (\Exception $e) {

            return $e->getMessage();
        }

        return Redirect::to("/dashboard")->withSuccess('Great! You have Successfully loggedin');
    }

    public function createAdd(){
        $user = auth()->user();
        $userName = $user->name;

        $fish =DB::table('fish')->get();
        return view('dashboard/buyer/buyerAdd',compact('fish'),compact('userName'));
    }

    public function postCreateAdd(Request $request){
        try {
            $user = auth()->user();

            $data = $request->all();
            $data['users_id'] = $user->id;
            $data['status'] = 'pending';

            $TotalFish = DB::table('fish')->where('id', $data['fish_id'])->first();


            BuyingAD::create($data);


            return Redirect::to("/dashboard")->withSuccess('Great! You have Successfully loggedin');
        } catch (\Exception $e) {

            return $e->getMessage();
        }


    }

    public function viewSellingAdds(){
        $user = auth()->user();
        $userName = $user->name;

        $sellingAdds = DB::table('selling_a_d_s')->where('status','pending')->get();
        foreach ($sellingAdds as $sellingAdd){
            $seller = DB::table('users')->where('id',$sellingAdd->users_id)->first();
            $fishName=DB::table('fish')->where('id',$sellingAdd->fish_id)->first();
            $sellingAdd->fish_name = $fishName->name;
            $sellingAdd->user = $seller->name;
        }
       return view('dashboard/buyer/viewSellingAdds',compact('sellingAdds'),compact('userName'));
    }

    public function setOrder($sellingId){
        $user = auth()->user();
        $userName = $user->name;

        $sellingAdd = DB::table('selling_a_d_s')->where('id',$sellingId)->first();
        $fish=DB::table('fish')->where('id',$sellingAdd->fish_id)->first();

        $seller = DB::table('users')->where('id',$sellingAdd->users_id)->first();

        $sellingAdd->fish_name = $fish->name;
        $sellingAdd->total_amount = $fish->amount;
        $sellingAdd->seller = $seller;

        return view('dashboard/buyer/setOrder',compact('sellingAdd'),compact('userName'));

    }

    public function postSetOrder(Request $request,$sellingId){
        try {
            $user = auth()->user();

            $data = $request->all();
            $data['selling_id'] = $sellingId;
            $data['status'] = "ordered";
            $data['buyer_id'] = $user->id;

            Order::create($data);


            return Redirect::to("dashboard/buyer/viewOrders")->withSuccess('Great! You have Successfully loggedin');
        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }

    public function viewMyOrders(){
        try {
            $user = auth()->user();
            $userName = $user->name;
            $myOrders = DB::table('orders')->where('buyer_id',$user->id)->get();
            foreach ($myOrders as $myOrder){
                $sellingAdd=DB::table('selling_a_d_s')->where('id',$myOrder->selling_id)->first();
                $fishName=DB::table('fish')->where('id',$sellingAdd->fish_id)->first();
                $myOrder->fish_name = $fishName->name;
                $myOrder->price = $sellingAdd->price;
            }
            return view('dashboard/buyer/viewMyOrders',compact('myOrders'),compact('userName'));
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }
}
