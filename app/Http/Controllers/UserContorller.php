<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use Session;

use App\Models\User;

class UserContorller extends Controller
{
    public function reg(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'password2' => 'required',

        ]);
               $user = new User();
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->password = Hash::make($request->input('password'));
                $user->last_name = $request->input('last_name');
                $res = $user->save();
            
     
            // redirect to home
                // return redirect()->back();
                if($res){
                    return back()->with('success','Вы успешно зарегистрированы!');
                }else{
                    return back()->with('file','dsadsa');
                }
    }

    public function login(Request $request)
    {
    	 $request->validate([
            
            'email' => 'required|email',
            'password' => 'required',

        ]);
         

        $user = User::where('email','=',$request->email)->first();
        

        if($user){
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('loginId',$user->id);
                $request->session()->put('loginName',$user->name);
                return redirect()->back();

            }else{
                return"Не верный логин или пароль";
            }
        }else{
                return"Не верный логин или пароль";
         }
    }
            

            
         

       

  

    public function logout(Request $request)
    {
    	
        session()->pull('loginId');
        return redirect()->back();
           
        
    }
}
