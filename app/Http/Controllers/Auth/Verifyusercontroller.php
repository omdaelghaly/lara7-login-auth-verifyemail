<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Verifyemail;
use App\Models\User;
use App\Models\Verifyuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class Verifyusercontroller extends Controller
{
    //
    public function sendemailverify()
    {
      
        //set token
        $code = rand(10000,1000000);
        $token = md5($code);
        
        //set time expire
        $timeex = 60 * 60;
        $time=date("Y-m-d H:i:s",$timeex);
        $limittime= strtotime($time);
         //time now 
        $timenow =  date("Y-m-d H:i:s");
        $now= strtotime($timenow);
         //time now + expire time
        $expire  = $now + $limittime;
  
        $id = auth()->user()->id;
        $verifyuser = auth()->user()->verifyemail ;
        
        $user = User::where('id',$id)->with('getverifyuser')->first();
         //check if verifyeied user
        if($verifyuser == 0) 
        {
                  //if there is a user record in verifyuser
                  if($user->getverifyuser )
                   {
                            //     //check expire < now if u dont want to send many times
                            //updateif exist 
                            $user->getverifyuser->update([
                                            'user_id' => $id,
                                            'token'   => $token,
                                            'expire'  => $expire
                                            ]);
                            $user = User::where('id',$id)->with('getverifyuser')->first();
                          Mail::to($user->email)->send(new Verifyemail($user));

                   }else
                    {
                              Verifyuser::create([
                                'user_id' => $id,
                                'code'    => '0' ,
                                'token'   => $token,
                                'expire'  => $expire,
                              ]);
     
                            $user = User::where('id',$id)->with('getverifyuser')->first();
                           Mail::to($user->email)->send(new Verifyemail($user));
                              
                   }
        }else //so user is verifyed
        {
           if($user->getverifyuser){
           $user->getverifyuser->delete();
           }

          return redirect()->route('home') ;
        }

          


         return view('auth.emailverify');
          
    }





//////////////////////callback/////////////////

     public function callback_ve($email,$token)
     {
                    //time now 
            $timenow =  date("Y-m-d H:i:s");
            $now     = strtotime($timenow);
            
            $id         = auth()->user()->id; 
            $verifyuser = auth()->user()->verifyemail ;
            $emailDB    = auth()->user()->email ;
            $user = User::where('id',$id)->with('getverifyuser')->first();
  
            if($verifyuser == 0)//if verified
            {
             if($user->getverifyuser){
                $expire     = auth()->user()->getverifyuser->expire ;
                $tokenDB    = auth()->user()->getverifyuser->token ;
                    //checkexpire
                    if($now < $expire )// the token is ok
                    {
                               if($emailDB == $email && $tokenDB == $token  )
                               {//link is ok 
                                $id   = Auth::user()->id;
                                $user = User::find($id);
                                $user->verifyemail = 1;
                                $user->save();
                                //delete user row token verify
                                $row  = auth()->user()->getverifyuser ;
                                $row->delete();
     
                                  return redirect()->route('home') ;

                              }else
                               { // هناك خطا فى الرابط 
                                Session::flash('msg',  __('myauth.linkwrong')); 
                                return redirect()->route('verifyemailpage') ;
                               }
                         
                    }else //token is expired
                    { //اتهت صلاحية الرابط
                      Session::flash('msg',  __('myauth.tokenexpired')); 
                      return redirect()->route('verifyemailpage') ;

                    }
                 }else
                 {
                  Session::flash('msg',  __('myauth.linkwrong')); 
                  return redirect()->route('verifyemailpage') ;
                 }   

            }else//so you are verifyed
            {
                  
               return redirect()->route('home') ;
            }






     }
    
}
