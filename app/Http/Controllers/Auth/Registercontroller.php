<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Registerreq;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class Registercontroller extends Controller
{
    //







    //register page 
    public function registerpage(){
        if(auth()->user()){
            return redirect()->route('home');
        }
        return view('auth.register');
    }
    



     //register user / validate request ->register request
    public function newregister(Registerreq $request)
    {
        //validate
    // $validate = Validator::make($request->all(),$this->rules(),$this->messages());
        
        //insert user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            ]);

               
        if( Auth::attempt(array('email' => $request->email, 'password' => $request->password)))
            {
                    return response()->json([
                        'status'=>'success',
                    ]);
          }else{
                  return response()->json([
                        'status'=>'error',
                    ]);

          }                  
        
    }

      
    //realtime register validate request
    public function realtimevalidateregister(Registerreq $request){
        return response()->json(['validate'=>'ok']);
    }
        
   
   
  
   


}
