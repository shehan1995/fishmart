<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator, Redirect, Response;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

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
        ]);

        $data = $request->all();

        try {
            $check = $this->create($data);
            return Redirect::to("/dashboard")->withSuccess('Great! You have Successfully loggedin');
        } catch (\Exception $e) {
            dump($data);
            return redirect()->back()->withInput()->withErrors(['nic' => 'Sorry nic and password not matched']);
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
                return view('dashboard/buyer/buyerBody', compact('userName'));
            }

        }
        return Redirect::to("login")->withSuccess('Opps! You do not have access');
    }

    public function adminDashboard()
    {
        $user = auth()->user();
        $userName = $user->name;

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
        $details['sellingPending'] = $sellingPending * 100 / count($sellingAds);
        $details['sellingConfirmed'] = $sellingConfirmed * 100 / count($sellingAds);
        $details['sellingInactive'] = $sellingInactive * 100 / count($sellingAds);

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
        $details['buyingOpen'] = $buyningOpen * 100 / (count($buyingAdds) + 1);
        $details['buyingCancel'] = $buyingCancel * 100 / (count($buyingAdds) + 1);

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
        $details['sellers'] = $sellers * 100 / count($users);
        $details['buyers'] = $buyer * 100 / count($users);
        $details['users'] = count($users);

        $fish = DB::table('fish')->get();
        $totalFish = 0;
        $fishArray = [];
        foreach ($fish as $f) {
            $fArray['name'] = $f->name;
            $fArray['count'] = $f->amount;
            $totalFish = $totalFish + ($f->amount);
            array_push($fishArray, $fArray);
        }
        $details['fish'] = $fishArray;
        $details['totalFish'] = $totalFish;
//                dump($details);
        return view('dashboard/admin/adminBody', compact('userName'), compact('details'));
    }

    public function sellerDashboard()
    {
        $user = auth()->user();
        $userName = $user->name;

        $sellingPending = 0;
        $sellingOrdered = 0;
        $sellingSold = 0;
        $sellingAds = DB::table('selling_a_d_s')->where('users_id', $user->id)->get();
        foreach ($sellingAds as $myAdd) {
            if ($myAdd->status == "pending") {
                $sellingPending = $sellingPending + 1;
            } elseif ($myAdd->status == "ordered") {
                $sellingOrdered = $sellingOrdered + 1;
            } else {
                $sellingSold = $sellingSold + 1;
            }
        }
        $details['pendingAdds'] = $sellingPending;
        $details['advertisements'] = ($sellingSold * 100) / ($sellingSold + $sellingPending + $sellingOrdered+1);
        $details['openStatus'] = ($sellingPending * 100) / ($sellingSold + $sellingPending + $sellingOrdered+1);
        $details['orderedStatus'] = ($sellingOrdered * 100) / ($sellingSold + $sellingPending + $sellingOrdered+1);
        $details['soldStatus'] = ($sellingSold * 100) / ($sellingSold + $sellingPending + $sellingOrdered+1);

        $year = Carbon::parse(2020);
        $orders = DB::table('selling_a_d_s')->leftJoin('orders', 'selling_a_d_s.id', '=', 'orders.selling_id')
            ->where('users_id', $user->id)->get();
//        $orders = DB::table('orders')->where('selling_id',$user->id)->whereYear('created_at', '=', date('Y','2020'))->get();
        dump($orders);
        $fromDate = Carbon::today();
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

        $toMonth = Carbon::today()->addMonths(-1);
        $monthly = $annuals;
        $monthlyIncome = 0;
        foreach ($monthly as $month){
            $price = $sellingAds->where('id','=',$month->selling_id);
            foreach ($price as $p){
                $monthlyIncome = $monthlyIncome+(($month->amount)*$p->price);
            }

        }
        $details['monthly'] = $monthlyIncome;

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


dump($details);
        return view('dashboard/seller/sellerBody', compact('userName'), compact('details'));

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
            'password' => Hash::make($data['password'])
        ]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}