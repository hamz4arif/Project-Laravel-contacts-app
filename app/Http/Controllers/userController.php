<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{
    public function profile()
    {
        $id = auth()->user()->id;
        $user = User::find($id);
        // $contacts = contact::where('userID', $id)->orderBy("id", "desc")->paginate(10);
        return view('profile', ['user' => $user]);
    }
    public function editprofile($id)
    {
        $user = User::find($id);
        // return $user;
        return view('editprofile', ['user' => $user]);
    }
    public function updateprofile(Request $req, $id)
    {
        $user = User::find($id);
        $user->name = $req->name;
        $user->email = $req->email;
        if ($user->save()) {
            return redirect('profile')->with('profileupdated', "your profile updated successfully");
        }
        // return $req->input('name');
        // return $user;
        // return view('editprofile', ['user'=> $user]);
    }
    public function deleteprofile($id)
    {
        $user = User::find($id);
        if ($user->delete()) {
            return redirect('/');
        }
    }
    public function testing(){
        $user=User::Find(2);
        return $user;
    }
}
