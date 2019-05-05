<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Address;

class UserController extends Controller
{
    public function list_user()
    {
        $users=User::orderBy('id')->paginate();
        return view('list_user',compact('users'));
    }

    public function register_user()
    {
        return view('register_user');
    }

    public function register_user_data(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:10', 
            'email' => 'required',
            'password' => 'required'
        ]);
        #User::create($request->all());
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =bcrypt($request->password);
        $user->save();
        return redirect()->route('index')->with('success','Successfully added user');
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

    public function register_addres()
    {
        $user = User::orderBy('id')->get();
        return view('register_addres',compact('user'));
    }

    public function register_addres_data(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:10', 
            'country' => 'required',
            'user_id' => 'required'
        ]);
        #User::create($request->all());
        $addres = new Address;
        $addres->name = $request->name;
        $addres->country = $request->country;
        $user = User::find($request->user_id);
        $user->address()->save($addres);
        return redirect()->route('index')->with('success','Successfully added user');
    }

    public function list_addres()
    {
        #$addres = Address::orderBy('id')->get();
        $addres = Address::with("user")->get();
        return view('list_addres',compact('addres'));
    }
}
