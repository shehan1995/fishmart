<?php

namespace App\Http\Controllers;

use App\Models\Fish;
use App\User;
use Illuminate\Http\Request;
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
        $details['user_image']= $user->image;
        return view('dashboard/admin/adminFish',compact('details'));
    }
    public function postCreateFish(Request $request)
    {

        try {
            request()->validate([
                'name' => 'required',
                'avg_price'=>'required'
            ]);
            $data = $request->all();
            $data['amount']=0;
            $fish = Fish::create($data);
            return Redirect::to("/dashboard")->withSuccess('Great! You have Successfully added fish');
        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }


    public function editProfile(){
        $user = auth()->user();
        $details['name']= $user->name;
        $details['user_image']= $user->image;

        return view('dashboard/admin/adminEditProfile',compact('user'),compact('details'));
    }
    public function viewProfile(){
        $user = auth()->user();
        $details['name']= $user->name;
        $details['user_image']= $user->image;
        return view('dashboard/admin/adminViewProfile',compact('user'),compact('details'));
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
}
