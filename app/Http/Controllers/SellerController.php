<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        return view('dashboard/sellerEditProfile',compact('user'));
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
            $show = User::findOrFail($user->id);
            $show->update($data);
        } catch (\Exception $e) {

            return $e->getMessage();
        }




       // dump($data);
//
//        //$check = $this->update($data,$user);
//        $usr = Show::findOrFail($user->id);
//        dump($usr);
//        return view('dashboard/sellerEditProfile',compact('user'));
        return Redirect::to("/dashboard")->withSuccess('Great! You have Successfully loggedin');
    }
}
