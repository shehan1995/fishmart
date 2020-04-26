<?php

namespace App\Http\Controllers;

use App\Models\Fish;
use App\Models\Order;
use App\Models\SellingAD;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

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
    public function update(Request $request, User $user)
    {
        $user->save();
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

        return view('dashboard/seller/sellerEditProfile',compact('user'));
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
        $fish =DB::table('fish')->get();
        dump($fish);
        return view('dashboard/seller/sellerAdd',compact('fish'));
    }

    public function postCreateAdd(Request $request){
        try {
            $user = auth()->user();

            $data = $request->all();
            $data['users_id'] = $user->id;
            $data['status'] = 'pending';
            dump($data);

            $TotalFish = DB::table('fish')->where('id', $data['fish_id'])->first();
            $totalFishAmount = $data['amount'] + $TotalFish->amount;
            dump($totalFishAmount);
            $affected = DB::table('fish')
                ->where('id', $data['fish_id'])
                ->update(['amount' => $totalFishAmount]);

            SellingAD::create($data);


            return Redirect::to("/dashboard")->withSuccess('Great! You have Successfully loggedin');
        } catch (\Exception $e) {

            return $e->getMessage();
        }


    }

    public function viewOrders(){
        try {
            $user = auth()->user();

            $data = array();
            $myAdds = DB::table('selling_a_d_s')->where('users_id',$user->id)->get();
            foreach ($myAdds as $myAdd){
                $fishName=DB::table('fish')->where('id',$myAdd->fish_id)->first();
                $orders = DB::table('orders')->where([['selling_id',$myAdd->id],['status','ordered']])->get();
                $myAdd->orders = $orders;
                $myAdd->fish_name = $fishName->name;
                $myAdd->fish_total = $fishName->amount;
                $addArray = array();
                $addArray['orders']=$myAdd;
                array_push($data,$addArray);
            }
            return view('dashboard/seller/viewMyOrders',compact('data'));
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function postSetOrder(Request $req, $orderStatus){

        try {
            $user = auth()->user();
            $data = $req->all();;
            dump($orderStatus);
            if($orderStatus=="confirm"){
dump("if");
                $affected1 = DB::table('selling_a_d_s')
                    ->where('id', $req->sellingId)
                    ->update(['amount'=>$req->orderAmount]);
                $affected2 = DB::table('fish')
                    ->where('id', $req->fishId)
                    ->update(['amount'=>$req->fish_total]);
            }
            $affected = DB::table('orders')
                ->where('id', $req->orderId)
                ->update(['status' => $orderStatus]);

            return Redirect::to("dashboard/seller/orders")->withSuccess('Great! You have Successfully loggedin');
        } catch (\Exception $e) {

            return $e->getMessage();
        }

    }
}
