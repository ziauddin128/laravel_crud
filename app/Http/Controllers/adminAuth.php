<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminAuth extends Controller
{
    function login(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password"=>"required"
        ]);

        $email = $request->input('email');
        $password = $request->input('password');
       
        $result = DB::table('admin')
                     ->where('email',"$email")
                     ->where('password',$password)
                     ->get();

       if(isset($result[0]->id))
       {
          $request->session()->put('adminId',$result[0]->id);
          $request->session()->put('adminName',$result[0]->username);
          return redirect('student/list');
       }
       else 
       {
         $request->session()->flash('msg','Please Enter Valid Login Details');
         return redirect('/');
       }
        
    }
}
