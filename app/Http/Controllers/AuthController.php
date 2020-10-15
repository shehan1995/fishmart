<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use mysql_xdevapi\Exception;
use Validator, Redirect;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

use Illuminate\Support\Facades\Response;


class AuthController extends Controller
{

    public function index()
    {
        return view('login');
    }

    public function registration()
    {
        if (Auth::check()) {

            $user = auth()->user();
            $userName = $user->name;
            if (($user->categary) == "Admin") {
                return view('dashboard/admin/registration');
            }
            return view('registration');
        } else {
            return view('registration');
        }
    }

    public function postLogin(Request $request)
    {
        request()->validate([
            'nic' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('nic', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }
        return redirect()->back()->withInput()->withErrors(['nic' => 'Sorry nic and password not matched']);
    }

    public function postRegistration(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'nic' => 'required|unique:users',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'user_image' => 'required|image|max:2048',
        ]);
        $data = $request->all();

        $path = $request->file('user_image')->storeAs('public/user',$data['nic']);


        $data['user_image'] = "user/{$data['nic']}";


        try {
            $check = $this->create($data);
            return Redirect::to("/dashboard")->withSuccess('Great! You have Successfully loggedin');
        } catch (\Exception $e) {
        dump($e->getMessage());
            return redirect()->back()->withInput()->withErrors(['nic' => $e->getMessage()]);
        }

    }


    public function dashboard()
    {

        if (Auth::check()) {
            $user = auth()->user();
            $userName = $user->name;
            if (($user->categary) == "Admin") {

                return redirect()->intended('dashboard/admin');


            } else if (($user->categary) == "Seller") {
                $adds = DB::table('selling_a_d_s')->where('status', 'sold')->get();
                return redirect()->intended('dashboard/seller');

            } else {
                return redirect()->intended('dashboard/buyer');

            }

        }
        return Redirect::to("login")->withSuccess('Opps! You do not have access');
    }

    public function adminDashboard()
    {
        if (!Auth::check()) {
            return Redirect::to("login")->withSuccess('Opps! You do not have access');
        }
        //get user details
        $user = auth()->user();
        dump($user);
        try {
            $details['user_image'] ="storage/{$user->image}" ;
        }catch (Exception $e){
            $details['user_image'] ="storage/default_user.png" ;
            return dump($e);
        }
        $details['user_image'] ="storage/default_user.png" ;
        $details['name'] =$user->name;

        $sellingPending = 0;
        $sellingConfirmed = 0;
        $sellingInactive = 0;
        $sellingAds = DB::table('selling_a_d_s')->get();
        foreach ($sellingAds as $myAdd) {
            if ($myAdd->status == "pending") {
                $sellingPending = $sellingPending + 1;
            } elseif ($myAdd->status == "ordered") {
                $sellingConfirmed = $sellingConfirmed + 1;
            } else {
                $sellingInactive = $sellingInactive + 1;
            }
        }
        $details['selling'] = count($sellingAds);
        if(count($sellingAds)!=0){
            $details['sellingPending'] = $sellingPending * 100 / count($sellingAds);
            $details['sellingConfirmed'] = $sellingConfirmed * 100 / count($sellingAds);
            $details['sellingInactive'] = $sellingInactive * 100 / count($sellingAds);
        }else{
            $details['sellingPending'] = 0;
            $details['sellingConfirmed'] = 0;
            $details['sellingInactive'] = 0;
        }

        $buyningOpen = 0;
        $buyingCancel = 0;
        $buyingAdds = DB::table('buying_a_d_s')->get();
        foreach ($buyingAdds as $myAdd) {
            if ($myAdd->status == "open") {
                $buyningOpen = $buyningOpen + 1;
            } elseif ($myAdd->status == "cancel") {
                $buyingCancel = $buyingCancel + 1;
            }
        }
        $details['buying'] = count($buyingAdds);

        if (count($buyingAdds)!=0){
            $details['buyingOpen'] = $buyningOpen * 100 / (count($buyingAdds));
            $details['buyingCancel'] = $buyingCancel * 100 / (count($buyingAdds));
        }else{
            $details['buyingOpen'] = 0;
            $details['buyingCancel'] =0;
        }


        $sellers = 0;
        $buyer = 0;
        $users = DB::table('users')->get();
        foreach ($users as $user) {
            if ($user->categary == "Seller") {
                $sellers = $sellers + 1;
            } elseif ($user->categary == "Buyer") {
                $buyer = $buyer + 1;
            }
        }
        if (count($users)!=0){
            $details['sellers'] = $sellers * 100 / count($users);
            $details['buyers'] = $buyer * 100 / count($users);
        }else{
            $details['sellers'] =0;
            $details['buyers'] = 0;
        }

        $details['users'] = count($users);

        $fish = DB::table('fish')->get();
        $totalFish = 0;
        $fishArray = [];
        foreach ($fish as $f) {
            $totalFish = $totalFish + ($f->amount);
        }
        foreach ($fish as $f) {
            $fArray['name'] = $f->name;
            $fArray['count'] = $f->amount;
            if($totalFish!=0){
                $fArray['fish_bar']=$f->amount *100 /$totalFish;
            }else{
                $fArray['fish_bar']=0;
            }
            array_push($fishArray, $fArray);
        }
        $details['fish'] = $fishArray;
        $details['totalFish'] = $totalFish;

//                dump($details);
        return view('dashboard/admin/adminBody', compact('details'));
    }

    public function sellerDashboard()
    {
        $user = auth()->user();

        $details['user_image'] ="storage/{$user->image}" ;
        $details['name'] =$user->name;

        //get selling adds from database
        $sellingPending = 0;
        $sellingOrdered = 0;
        $sellingSold = 0;
        $sellingAds = DB::table('selling_a_d_s')->where('users_id', $user->id)->get();
        foreach ($sellingAds as $myAdd) {
            if ($myAdd->status == "pending") {
                $sellingPending = $sellingPending + 1;
            } elseif ($myAdd->status == "ordered") {
                $sellingOrdered = $sellingOrdered + 1;
            } elseif  ($myAdd->status == "sold"){
                $sellingSold = $sellingSold + 1;
            }
        }

        //set for dashboard parameters
        $details['pendingAdds'] = $sellingPending;
        if ($sellingSold!=0 && $sellingPending!=0 && $sellingOrdered!=0){
            $details['advertisements'] = ($sellingSold * 100) / ($sellingSold + $sellingPending + $sellingOrdered);
            $details['openStatus'] = ($sellingPending * 100) / ($sellingSold + $sellingPending + $sellingOrdered);
            $details['orderedStatus'] = ($sellingOrdered * 100) / ($sellingSold + $sellingPending + $sellingOrdered);
            $details['soldStatus'] = ($sellingSold * 100) / ($sellingSold + $sellingPending + $sellingOrdered);
        }else{
            $details['advertisements'] = 0;
            $details['openStatus'] = 0;
            $details['orderedStatus'] = 0;
            $details['soldStatus'] = 0;
        }


        $year = Carbon::parse(2020);
        $orders = DB::table('selling_a_d_s')->leftJoin('orders', 'selling_a_d_s.id', '=', 'orders.selling_id')
            ->where('users_id', $user->id)->get();
//        $orders = DB::table('orders')->where('selling_id',$user->id)->whereYear('created_at', '=', date('Y','2020'))->get();

        //get annual adds
        $fromDate = Carbon::tomorrow();
        $toYear = Carbon::today()->addYears(-1);
        $annuals = $orders->whereBetween('updated_at', [$toYear, $fromDate])->where('status', '=', "confirm");
        $annualIncome = 0;
        foreach ($annuals as $annual){
            $price = $sellingAds->where('id','=',$annual->selling_id);
            foreach ($price as $p){
                $annualIncome = $annualIncome+(($annual->amount)*$p->price);
            }

        }
        $details['annual'] = $annualIncome;

        //get monthly adds
        $toMonth = Carbon::today()->addMonths(-1);
        $monthly = $orders->whereBetween('updated_at', [$toMonth, $fromDate])->where('status', '=', "confirm");
        $monthlyIncome = 0;
        foreach ($monthly as $month){
            $price = $sellingAds->where('id','=',$month->selling_id);
            foreach ($price as $p){
                $monthlyIncome = $monthlyIncome+(($month->amount)*$p->price);
            }

        }
//        dump($toMonth);
        $details['monthly'] = $monthlyIncome;

        //get januart orders
        $janOrders = DB::table('selling_a_d_s')->leftJoin('orders', 'selling_a_d_s.id', '=', 'orders.selling_id')
            ->where('users_id', $user->id)->where('orders.status','=',"confirm")->whereMonth('orders.updated_at','=','1')->get();
        $janIncome = 0;
        foreach ($janOrders as $month){
            $price = $sellingAds->where('id','=',$month->selling_id);
            foreach ($price as $p){
                $janIncome = $janIncome+(($month->amount)*$p->price);
            }
        }
        $details['jan'] = $janIncome;

        $febOrders = DB::table('selling_a_d_s')->leftJoin('orders', 'selling_a_d_s.id', '=', 'orders.selling_id')
            ->where('users_id', $user->id)->where('orders.status','=',"confirm")->whereMonth('orders.updated_at','=','2')->get();
        $febIncome = 0;
        foreach ($febOrders as $month){
            $price = $sellingAds->where('id','=',$month->selling_id);
            foreach ($price as $p){
                $febIncome = $febIncome+(($month->amount)*$p->price);
            }
        }
        $details['feb'] = $febIncome;

        $MarOrders = DB::table('selling_a_d_s')->leftJoin('orders', 'selling_a_d_s.id', '=', 'orders.selling_id')
            ->where('users_id', $user->id)->where('orders.status','=',"confirm")->whereMonth('orders.updated_at','=','3')->get();
        $marIncome = 0;
        foreach ($MarOrders as $month){
            $price = $sellingAds->where('id','=',$month->selling_id);
            foreach ($price as $p){
                $marIncome = $marIncome+(($month->amount)*$p->price);
            }
        }
        $details['mar'] = $marIncome;

        $aprOrders = DB::table('selling_a_d_s')->leftJoin('orders', 'selling_a_d_s.id', '=', 'orders.selling_id')
            ->where('users_id', $user->id)->where('orders.status','=',"confirm")->whereMonth('orders.updated_at','=','4')->get();
        $aprIncome = 0;
        foreach ($aprOrders as $month){
            $price = $sellingAds->where('id','=',$month->selling_id);
            foreach ($price as $p){
                $aprIncome = $aprIncome+(($month->amount)*$p->price);
            }
        }
        $details['apr'] = $aprIncome;

        $monthOrders = DB::table('selling_a_d_s')->leftJoin('orders', 'selling_a_d_s.id', '=', 'orders.selling_id')
            ->where('users_id', $user->id)->where('orders.status','=',"confirm")->whereMonth('orders.updated_at','=','5')->get();
        $monthIncome = 0;
        foreach ($monthOrders as $month){
            $price = $sellingAds->where('id','=',$month->selling_id);
            foreach ($price as $p){
                $monthIncome = $monthIncome+(($month->amount)*$p->price);
            }
        }
        $details['may'] = $monthIncome;

        $monthOrders = DB::table('selling_a_d_s')->leftJoin('orders', 'selling_a_d_s.id', '=', 'orders.selling_id')
            ->where('users_id', $user->id)->where('orders.status','=',"confirm")->whereMonth('orders.updated_at','=','6')->get();
        $monthIncome = 0;
        foreach ($monthOrders as $month){
            $price = $sellingAds->where('id','=',$month->selling_id);
            foreach ($price as $p){
                $monthIncome = $monthIncome+(($month->amount)*$p->price);
            }
        }
        $details['jun'] = $monthIncome;

        $monthOrders = DB::table('selling_a_d_s')->leftJoin('orders', 'selling_a_d_s.id', '=', 'orders.selling_id')
            ->where('users_id', $user->id)->where('orders.status','=',"confirm")->whereMonth('orders.updated_at','=','7')->get();
        $monthIncome = 0;
        foreach ($monthOrders as $month){
            $price = $sellingAds->where('id','=',$month->selling_id);
            foreach ($price as $p){
                $monthIncome = $monthIncome+(($month->amount)*$p->price);
            }
        }
        $details['jul'] = $monthIncome;

        $monthOrders = DB::table('selling_a_d_s')->leftJoin('orders', 'selling_a_d_s.id', '=', 'orders.selling_id')
            ->where('users_id', $user->id)->where('orders.status','=',"confirm")->whereMonth('orders.updated_at','=','8')->get();
        $monthIncome = 0;
        foreach ($monthOrders as $month){
            $price = $sellingAds->where('id','=',$month->selling_id);
            foreach ($price as $p){
                $monthIncome = $monthIncome+(($month->amount)*$p->price);
            }
        }
        $details['aug'] = $monthIncome;

        $monthOrders = DB::table('selling_a_d_s')->leftJoin('orders', 'selling_a_d_s.id', '=', 'orders.selling_id')
            ->where('users_id', $user->id)->where('orders.status','=',"confirm")->whereMonth('orders.updated_at','=','9')->get();
        $monthIncome = 0;
        foreach ($monthOrders as $month){
            $price = $sellingAds->where('id','=',$month->selling_id);
            foreach ($price as $p){
                $monthIncome = $monthIncome+(($month->amount)*$p->price);
            }
        }
        $details['sep'] = $monthIncome;

        $monthOrders = DB::table('selling_a_d_s')->leftJoin('orders', 'selling_a_d_s.id', '=', 'orders.selling_id')
            ->where('users_id', $user->id)->where('orders.status','=',"confirm")->whereMonth('orders.updated_at','=','10')->get();
        $monthIncome = 0;
        foreach ($monthOrders as $month){
            $price = $sellingAds->where('id','=',$month->selling_id);
            foreach ($price as $p){
                $monthIncome = $monthIncome+(($month->amount)*$p->price);
            }
        }
        $details['oct'] = $monthIncome;

        $monthOrders = DB::table('selling_a_d_s')->leftJoin('orders', 'selling_a_d_s.id', '=', 'orders.selling_id')
            ->where('users_id', $user->id)->where('orders.status','=',"confirm")->whereMonth('orders.updated_at','=','11')->get();
        $monthIncome = 0;
        foreach ($monthOrders as $month){
            $price = $sellingAds->where('id','=',$month->selling_id);
            foreach ($price as $p){
                $monthIncome = $monthIncome+(($month->amount)*$p->price);
            }
        }
        $details['nov'] = $monthIncome;

        $monthOrders = DB::table('selling_a_d_s')->leftJoin('orders', 'selling_a_d_s.id', '=', 'orders.selling_id')
            ->where('users_id', $user->id)->where('orders.status','=',"confirm")->whereMonth('orders.updated_at','=','12')->get();
        $monthIncome = 0;
        foreach ($monthOrders as $month){
            $price = $sellingAds->where('id','=',$month->selling_id);
            foreach ($price as $p){
                $monthIncome = $monthIncome+(($month->amount)*$p->price);
            }
        }
        $details['dec'] = $monthIncome;


//dump($details);
        return view('dashboard/seller/sellerBody', compact('userName'), compact('details'));

    }

    public function buyerDashboard(){
        $user = auth()->user();
        $details['name'] = $user->name;
        $details['user_image'] ="storage/{$user->image}" ;

        $orders = DB::table('orders')->where('buyer_id', $user->id)->get();
        $pendingOrders=0;
        $confirmOrders=0;
        $rejectOrders=0;
        foreach ($orders as $order){
            if ($order->status == 'reject'){
                $rejectOrders=$rejectOrders+1;
            }elseif ($order->status == 'confirm'){
                $confirmOrders=$confirmOrders+1;
            }else{
                $pendingOrders=$pendingOrders+1;
            }
        }
        $details['pendingCount']=$pendingOrders;
        if ($pendingOrders!=0 || $confirmOrders !=0 || $rejectOrders !=0){
            $details['pendingOrders']=$pendingOrders*100/($pendingOrders+$confirmOrders+$rejectOrders);
            $details['confirmOrders']=$confirmOrders*100/($pendingOrders+$confirmOrders+$rejectOrders);
            $details['rejectOrders']=$rejectOrders*100/($pendingOrders+$confirmOrders+$rejectOrders);
        }else{
            $details['pendingOrders']=0;
            $details['confirmOrders']=0;
            $details['rejectOrders']=0;
        }

        $buyingAdds = DB::table('buying_a_d_s')->where('users_id', $user->id)->where('status','open')->get()->count();
        $details['buyingAds']=$buyingAdds;

        $sellingAds = DB::table('selling_a_d_s')->get();

        //get annual adds
        $fromDate = Carbon::tomorrow();
        $toYear = Carbon::today()->addYears(-1);
        $annuals = $orders->whereBetween('updated_at', [$toYear, $fromDate])->where('status', '=', "confirm");
        $annualIncome = 0;
        foreach ($annuals as $annual){
            $price = $sellingAds->where('id','=',$annual->selling_id);
            foreach ($price as $p){
                $annualIncome = $annualIncome+(($annual->amount)*$p->price);
            }

        }
        $details['annual'] = $annualIncome;

        //get monthly adds
        $toMonth = Carbon::today()->addMonths(-1);
        $monthly = $orders->whereBetween('updated_at', [$toMonth, $fromDate])->where('status', '=', "confirm");
        $monthlyIncome = 0;
        foreach ($monthly as $month){
            $price = $sellingAds->where('id','=',$month->selling_id);
            foreach ($price as $p){
                $monthlyIncome = $monthlyIncome+(($month->amount)*$p->price);
            }

        }
        $details['monthly'] = $monthlyIncome;

        $monthOrders = DB::table('orders')
            ->where('buyer_id', $user->id)
            ->where('status','=',"confirm")->whereMonth('updated_at','=','1')->get();
        $monthIncome = 0;
        foreach ($monthOrders as $month){
            $price = $sellingAds->where('id','=',$month->selling_id);
            foreach ($price as $p){
                $monthIncome = $monthIncome+(($month->amount)*$p->price);
            }
        }
        $details['jan'] = $monthIncome;

        $monthOrders = DB::table('orders')
            ->where('buyer_id', $user->id)
            ->where('status','=',"confirm")->whereMonth('updated_at','=','2')->get();
        $monthIncome = 0;
        foreach ($monthOrders as $month){
            $price = $sellingAds->where('id','=',$month->selling_id);
            foreach ($price as $p){
                $monthIncome = $monthIncome+(($month->amount)*$p->price);
            }
        }
        $details['feb'] = $monthIncome;

        $monthOrders = DB::table('orders')
            ->where('buyer_id', $user->id)
            ->where('status','=',"confirm")->whereMonth('updated_at','=','3')->get();
        $monthIncome = 0;
        foreach ($monthOrders as $month){
            $price = $sellingAds->where('id','=',$month->selling_id);
            foreach ($price as $p){
                $monthIncome = $monthIncome+(($month->amount)*$p->price);
            }
        }
        $details['mar'] = $monthIncome;

        $monthOrders = DB::table('orders')
            ->where('buyer_id', $user->id)
            ->where('status','=',"confirm")->whereMonth('updated_at','=','4')->get();
        $monthIncome = 0;
        foreach ($monthOrders as $month){
            $price = $sellingAds->where('id','=',$month->selling_id);
            foreach ($price as $p){
                $monthIncome = $monthIncome+(($month->amount)*$p->price);
            }
        }
        $details['apr'] = $monthIncome;

        $monthOrders = DB::table('orders')
            ->where('buyer_id', $user->id)
            ->where('status','=',"confirm")->whereMonth('updated_at','=','5')->get();
        $monthIncome = 0;
        foreach ($monthOrders as $month){
            $price = $sellingAds->where('id','=',$month->selling_id);
            foreach ($price as $p){
                $monthIncome = $monthIncome+(($month->amount)*$p->price);
            }
        }
        $details['may'] = $monthIncome;

        $monthOrders = DB::table('orders')
            ->where('buyer_id', $user->id)
            ->where('status','=',"confirm")->whereMonth('updated_at','=','6')->get();
        $monthIncome = 0;
        foreach ($monthOrders as $month){
            $price = $sellingAds->where('id','=',$month->selling_id);
            foreach ($price as $p){
                $monthIncome = $monthIncome+(($month->amount)*$p->price);
            }
        }
        $details['jun'] = $monthIncome;

        $monthOrders = DB::table('orders')
            ->where('buyer_id', $user->id)
            ->where('status','=',"confirm")->whereMonth('updated_at','=','7')->get();
        $monthIncome = 0;
        foreach ($monthOrders as $month){
            $price = $sellingAds->where('id','=',$month->selling_id);
            foreach ($price as $p){
                $monthIncome = $monthIncome+(($month->amount)*$p->price);
            }
        }
        $details['jul'] = $monthIncome;

        $monthOrders = DB::table('orders')
            ->where('buyer_id', $user->id)
            ->where('status','=',"confirm")->whereMonth('updated_at','=','8')->get();
        $monthIncome = 0;
        foreach ($monthOrders as $month){
            $price = $sellingAds->where('id','=',$month->selling_id);
            foreach ($price as $p){
                $monthIncome = $monthIncome+(($month->amount)*$p->price);
            }
        }
        $details['aug'] = $monthIncome;

        $monthOrders = DB::table('orders')
            ->where('buyer_id', $user->id)
            ->where('status','=',"confirm")->whereMonth('updated_at','=','9')->get();
        $monthIncome = 0;
        foreach ($monthOrders as $month){
            $price = $sellingAds->where('id','=',$month->selling_id);
            foreach ($price as $p){
                $monthIncome = $monthIncome+(($month->amount)*$p->price);
            }
        }
        $details['sep'] = $monthIncome;

        $monthOrders = DB::table('orders')
            ->where('buyer_id', $user->id)
            ->where('status','=',"confirm")->whereMonth('updated_at','=','10')->get();
        $monthIncome = 0;
        foreach ($monthOrders as $month){
            $price = $sellingAds->where('id','=',$month->selling_id);
            foreach ($price as $p){
                $monthIncome = $monthIncome+(($month->amount)*$p->price);
            }
        }
        $details['oct'] = $monthIncome;

        $monthOrders = DB::table('orders')
            ->where('buyer_id', $user->id)
            ->where('status','=',"confirm")->whereMonth('updated_at','=','11')->get();
        $monthIncome = 0;
        foreach ($monthOrders as $month){
            $price = $sellingAds->where('id','=',$month->selling_id);
            foreach ($price as $p){
                $monthIncome = $monthIncome+(($month->amount)*$p->price);
            }
        }
        $details['nov'] = $monthIncome;

        $monthOrders = DB::table('orders')
            ->where('buyer_id', $user->id)
            ->where('status','=',"confirm")->whereMonth('updated_at','=','12')->get();
        $monthIncome = 0;
        foreach ($monthOrders as $month){
            $price = $sellingAds->where('id','=',$month->selling_id);
            foreach ($price as $p){
                $monthIncome = $monthIncome+(($month->amount)*$p->price);
            }
        }
        $details['dec'] = $monthIncome;

        return view('dashboard/buyer/buyerBody', compact('userName'), compact('details'));
    }
    public function create(array $data)
    {

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'nic' => $data['nic'],
            'address' => $data['address'],
            'number' => $data['number'],
            'categary' => $data['categary'],
            'password' => Hash::make($data['password']),
            'image'=>$data['user_image']
        ]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}