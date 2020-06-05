<?php

namespace App\Http\Controllers;

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

    public function adminDashboard(){
        $user = auth()->user();
        $userName = $user->name;

        $sellingPending = 0;
        $sellingConfirmed = 0;
        $sellingInactive = 0;
        $sellingAds = DB::table('selling_a_d_s')->get();
        foreach ($sellingAds as $myAdd) {
            if ($myAdd->status == "pending") {
                $sellingPending = $sellingPending + 1;
            } elseif ($myAdd->status == "confirmed") {
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
        $details['buyingOpen'] = $buyningOpen * 100 / (count($buyingAdds)+1);
        $details['buyingCancel'] = $buyingCancel * 100 / (count($buyingAdds)+1);

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
        $details['sellers'] = $sellers * 100/count($users);
        $details['buyers'] = $buyer*100/count($users);
        $details['users'] = count($users);

        $fish = DB::table('fish')->get();
        $totalFish=0;
        $fishArray=[];
        foreach ($fish as $f){
            $fArray['name'] = $f->name;
            $fArray['count']=$f->amount;
            $totalFish=$totalFish+($f->amount);
            array_push($fishArray,$fArray);
        }
        $details['fish'] = $fishArray;
        $details['totalFish'] = $totalFish;
//                dump($details);
        return view('dashboard/admin/adminBody', compact('userName'), compact('details'));
    }

    public function sellerDashboard(){
        $user = auth()->user();
        $userName = $user->name;

        return view('dashboard/seller/sellerBody', compact('userName'));

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