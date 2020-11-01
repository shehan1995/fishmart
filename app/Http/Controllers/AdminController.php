<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use App\Models\Alerts;
use App\Models\Fish;
use App\Models\Feedback;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
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

    public function createFish(){
        $user = auth()->user();
        $details['name']= $user->name;
        $details['user_image'] = "storage/{$user->image}";
        return view('dashboard/admin/adminFish',compact('details'));
    }
    public function postCreateFish(Request $request)
    {

        try {
            request()->validate([
                'name' => 'required',
                'avg_price'=>'required',
                'image' => 'required|image|max:2048',
            ]);
            $data = $request->all();
            $path = $request->file('image')->storeAs('public/fish',$data['name']);

            $data['amount']=0;
            $data['image'] = "fish/{$data['name']}";

            $fish = Fish::create($data);
            return Redirect::to("/dashboard")->withSuccess('Great! You have Successfully added fish');
        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }
    public function viewFish(){
        $user = auth()->user();
        $details['name']= $user->name;
        $details['user_image'] = "storage/{$user->image}";

        $fishes = DB::table('fish')->get();
        foreach ($fishes as $fish) {
            $img = "storage/{$fish->image}";
            $fish->img=$img;
        }
        $details['fishes']=$fishes;
        return view('dashboard/admin/viewFish',compact('user'),compact('details'));
    }

    public function editFish($fishId){
        $user = auth()->user();
        $details['name']= $user->name;
        $details['user_image'] = "storage/{$user->image}";

        $fish = Fish::findOrFail($fishId);
        return view('dashboard/admin/adminEditFish',compact('fish'),compact('details'));

    }

    public function postEditFish(Request $request){
        try {
            request()->validate([
                'name' => 'required',
                'avg_price' => 'required',
                'image' => 'image|max:2048',
            ]);
            $data = $request->all();
            $fish = Fish::findOrFail($data['id']);

            try {
                if ($data['image'] == null) {
                    $data['image'] = $fish->image;
                } else {
                    $path = $request->file('image')->storeAs('public/fish', $fish->name);

                    $data['image'] = "fish/{$fish->name}";
                }
            } catch (\Exception $er) {
                $data['image'] = $fish->image;
            }
            $fish->update($data);
        }catch (\Exception $e){
            return $e->getMessage();
        }
        return Redirect::to("/dashboard/admin/viewFish")->withSuccess('Great! You have Successfull');

    }

    public function editProfile(){
        $user = auth()->user();
        $details['name']= $user->name;
        $details['user_image'] = "storage/{$user->image}";

        return view('dashboard/admin/adminEditProfile',compact('user'),compact('details'));
    }
    public function viewProfile(){
        $user = auth()->user();
        $details['name']= $user->name;
        $details['user_image'] = "storage/{$user->image}";
        return view('dashboard/admin/adminViewProfile',compact('user'),compact('details'));
    }

    public function postEditProfile(Request $request){
        try {
            $user = auth()->user();
            request()->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:6',
                'image' => 'image|max:2048',
            ]);
            $data = $request->all();

            try {
                if ($data['image'] == null) {
                    $data['image'] = $user->image;
                } else {
                    $path = $request->file('image')->storeAs('public/user', $user->nic);

                    $data['image'] = "user/{$user->nic}";
                }
            } catch (\Exception $er) {
                $data['image'] = $user->image;
            }

            $data['password'] = Hash::make($data['password']);
            $show = User::findOrFail($user->id);
            $show->update($data);
        } catch (\Exception $e) {

            return $e->getMessage();
        }

        return Redirect::to("/dashboard")->withSuccess('Great! You have Successfully loggedin');
    }

    public function submitFeedback(Request $request){
        try {
            $data['name'] = $request->name;
            $data['number'] = $request->number;
            $data['description']= $request->description;
            $data['status'] = "pending";
            Feedback::create($data);
            return Redirect::to("/")->withSuccess('Great! You have Successfully Submit');
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function postSendAlert(Request $request){
        dump($request->all());
        try {
            $data['subject'] = $request->subject;
            $data['message'] = $request->message;
            $data['categary'] = $request->categary;
            $data['status'] = "open";
            Alerts::create($data);
            return Redirect::to("/dashboard")->withSuccess('Great! You have Successfully Submit');
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function viewFeedback(){
        $user = auth()->user();
        $details['name']= $user->name;
        $details['user_image'] = "storage/{$user->image}";
        $details['feedbacks'] = DB::table('feedback')->get();
        return view('dashboard/admin/viewFeedback',compact('user'),compact('details'));
    }

    public function viewAlerts(){
            $user = auth()->user();
            $details['name']= $user->name;
            $details['user_image'] = "storage/{$user->image}";
            $details['alerts'] = DB::table('alerts')->get();
            return view('dashboard/admin/viewAlerts',compact('user'),compact('details'));
        }

    public function sendAlert(){
        $user = auth()->user();
        $details['name']= $user->name;
        $details['user_image'] = "storage/{$user->image}";
        return view('dashboard/admin/postAlert',compact('user'),compact('details'));
    }

    public function updateFeedback($feedbackId){
        try {

            $feedback = Feedback::findOrFail($feedbackId);
            if($feedback) {
                $feedback->status = 'Responded';
                $feedback->save();
            }
        } catch (\Exception $e) {

            return $e->getMessage();
        }

        return Redirect::to("/dashboard/admin/viewFeedbacks")->withSuccess('Great! You have Successfully loggedin');

    }

    public function updateAlert($alertId){
        try {

            $alert = Alerts::findOrFail($alertId);
            if($alert) {
                $alert->status = 'close';
                $alert->save();
            }
        } catch (\Exception $e) {

            return $e->getMessage();
        }
        return Redirect::to("/dashboard/admin/viewAlerts")->withSuccess('Great! You have Successfully loggedin');

    }
}
