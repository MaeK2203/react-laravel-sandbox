<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect,Response,File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function register(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        DB::table('users')->insert([
            'name' =>   $name,
            'email' =>  $email ,
            'password'=> $password
        ]);
    }
    function login(Request $request)
    {
        $email =  $request->input('email');
        $password = $request->input('password');

        $user = DB::table('users')->where('email',$email)->first();
        if(!Hash::check($password, $user->password)) {
            echo "Not Matched";
        } else {
            //$user = DB::table('users')->where('email',$email)->first();
            echo $user->email;
        }
    }
}
