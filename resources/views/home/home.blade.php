
@extends('layout.app')








@section('pagecontent')
    
   <center>
   	 <h1  style="margin-top:30px ">
   	     welcome 
   	     <span style="color:green ">
   	     	           @if (Auth::user())
                        {{Auth::user()->name}}
                        @endif
   	     </span>

   	     in home page
   	 </h1>
   </center>

   
@endsection