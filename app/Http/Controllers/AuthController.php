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
        return view('register');
    }
     
    public function postLogin(Request $request)
    {
        request()->validate([
        'email' => 'required',
        'password' => 'required',
        ]);
 
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }
        return Redirect::to("login")->withSuccess('Oppes! You have entered invalid credentials');
    }
 
    public function postRegistration(Request $request)
    {  
        request()->validate([
        'name' => 'required',
        'nic'=>'required|unique:users',
        'email' => 'required|email',
        'password' => 'required|min:6',
        ]);
//        $filename='';
//        if ($request->hasFile('imgInp')) {
//            $file = $request->file('imgInp');
//            $extension = $file->getClientOriginalExtension();
//            $filename = time() . '.' . $extension;
//            $file->move('uploads/user/image/',$filename);
//        }else{
//            echo "noFIle", '<br>';
//            echo $request->input('image'), '<br>';
//        }
//        echo $filename, '<br>';
//        echo "space", '<br>';
        $data = $request->all();
//        array_push($data,$filename);
//        foreach($data as $result) {
//            echo $result, '<br>';
//        }
//        echo $data['imgInp'], '<br>';
        $check = $this->create($data);
       
        return Redirect::to("/dashboard")->withSuccess('Great! You have Successfully loggedin');
    }
     
    public function dashboard()
    {
 
      if(Auth::check()){
        $user = auth()->user();
        if (($user->categary)=="Admin"){
          return view('dashboard/adminDashboard');
        }else if(($user->categary)=="Seller"){
          return view('dashboard/sellerBody');
        }else{
          return view('dashboard/buyerDashboard');
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
        'image'=>$data['imgInp'],
        'password' => Hash::make($data['password'])
      ]);
    }
     
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}