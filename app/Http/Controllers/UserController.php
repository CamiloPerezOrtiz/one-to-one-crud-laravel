<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Address;

class UserController extends Controller
{
    public function list_addres()
    {
        #$addres = Address::orderBy('id')->get();
        #$addres = Address::with("user")->get();
        $addresses = DB::select('SELECT a.id, a.name, a.country, u.name AS user 
                                    FROM users AS u, addresses AS a 
                                    WHERE u.id = a.user_id');
        return view('list_addres',compact('addresses'));
    }

    public function register_addres()
    {
        return view('register_addres');
    }

    public function register_addres_data(Request $request)
    {
        $this->validate($request,[
            'address' => 'required|max:20', 
            'country' => 'required',
            'name' => 'required|max:10', 
            'email' => 'required',
            'password' => 'required'
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =bcrypt($request->password);
        $addres = new Address;
        $addres->name = $request->address;
        $addres->country = $request->country;
        $user->save();
        $user->address()->save($addres);
        return redirect()->route('list_addres')->with('success','Successfully added user');
    }

    public function edit_addres($id)
    {
        $addresses = Address::with("user")->find($id);
        $users = User::with("address")->find($addresses->user_id);
        /*$addresses = DB::select("SELECT a.name, a.country, u.name AS user, u.email 
                                    FROM users AS u, addresses AS a 
                                    WHERE u.id = a.user_id
                                    AND a.id = '$id'");*/
        return view('edit_addres',compact('addresses','users'));
    }

    public function edit_addres_data(Request $request, $id)
    {
        $this->validate($request,[
            'address' => 'required|max:20', 
            'country' => 'required',
            'name' => 'required|max:10', 
            'email' => 'required'
        ]);
        Address::find($id)->update([
            'name' => $request->address,
            'country' => $request->country,
        ]);
        $address = Address::with("user")->find($id);
        User::find($address->user_id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return redirect()->route('list_addres')->with('success','Successfully added user');
    }
    
    public function delete_addres($id)
    {
        $address = Address::find($id);
        $address->user()->delete();
        return redirect()->route('list_addres')->with('success','Successfully added user');
    }
}
