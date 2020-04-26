<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator,Redirect,Response;
Use App\User;
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
        return view('registration');
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
        return redirect()->back() ->withInput()->withErrors(['nic' => 'Sorry nic and password not matched']);
    }
 
    public function postRegistration(Request $request)
    {  
        request()->validate([
        'name' => 'required',
        'nic'=>'required|unique:users',
        'email' => 'required|email',
        'password' => 'required|min:6',
        ]);

        $data = $request->all();

        try {
            $check = $this->create($data);
            return Redirect::to("/dashboard")->withSuccess('Great! You have Successfully loggedin');
        }catch (\Exception $e){
            dump($data);
            return redirect()->back() ->withInput()->withErrors(['nic' => 'Sorry nic and password not matched']);
        }

    }


     
    public function dashboard()
    {

      if(Auth::check()){
        $user = auth()->user();
        if (($user->categary)=="Admin"){
          return view('dashboard/admin/adminDashboard');
        }else if(($user->categary)=="Seller"){
          return view('dashboard/seller/sellerBody');
        }else{
          return view('dashboard/buyer/buyerDashboard');
        }

      }
       return Redirect::to("login")->withSuccess('Opps! You do not have access');
    }
 
    public function create(array $data)
    {

      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'nic' => $data['nic'],
        'address' => $data['address'],
        'number' => $data['number'],
        'categary'=>$data['categary'],
        'password' => Hash::make($data['password'])
      ]);
    }
     
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}