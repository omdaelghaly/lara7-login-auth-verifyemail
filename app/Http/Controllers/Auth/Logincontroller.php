<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Loginreq;
use App\Http\Requests\Registerreq;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Logincontroller extends Controller
{


    // public function __construct() {
    //     $this->middleware('auth');
    // }
//login page 
public function loginpage(){
    if(auth()->user()){
        return redirect()->route('home');
    }
    return view('auth.login');
}



    
    public function newlogin(Loginreq $request)
    {
         $user = User::where('email', $request->email)->first();
           
         if($user){
        //check password
                if(Hash::check($request->password, $user->password))
                 {//pass true
                       if(Auth::attempt(array('email' => $request->email, 'password' => $request->password)))
                       {
                       
                            return response()->json([
                            'status'=>'success',
                            ]);   
                        
                       }
                }else{//pass false 
                          return response()->json([
                           'status'=>'errorpassword',
                            'msg'=> __('myauth.errorpassword'),
                       ]);
                   }  
         

            }else{
                  return response()->json([
                    'status'=>'erroremail',
                    'msg'=> __('myauth.emailnotexist'),
                    ]);
            };
        



 //return $request;
//  $email= $request->email;
//  $password=$request->password;
//  $user = User::where('email', $request->email)->first();
     

     //if(Auth::attempt(['email' => $email, 'password' => "12345"]))
    //  if(Hash::check($request->password, $user->password))
    //  {
    //      return "true". $user->password."===".$password ;
    //  }else{
    //      return "false" . $user->password."===".$password ;
    //  }
     
//          if($user){

//     $credentials = $request->only('email', 'password');
 
//     if (Auth::attempt($credentials)) {
//         return "righttttttttttt";

//     }else{
//         return  "noooooooooooooo";
//     }
//     // value="{{Request::old('email')}}                       
         
//    }else{
//     return "no useeeeeeeeeeeeeeer";
//    }

}

    
   //realtime register validate request
    public function realtimevalidatelogin(Loginreq $request)
    {
        return response()->json(['validate'=>'ok']);
    }
        
   



####################################################################################
//logout

public function logout(Request $request) {
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    
    return redirect('/login');
  }

}
