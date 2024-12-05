<?php

namespace App\Http\Controllers;

use App\Models\Ideasis;
use Illuminate\Http\Request;

use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class CreateIdeasisController extends Controller
{
    //

    public function Index()
    {
        if(Auth::check()){

        $id_user =  auth()->user()->id;
        $profile = User::find($id_user);
        $ideasis = Ideasis::all();
        
        return view('stories\Createideasi',compact('profile','ideasis'));

        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

}
