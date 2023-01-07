@extends('layout.auth')



@section('title',__('myauth.emailv') )


@section('content')


<div>



    <div id="verifyform" class="col-xxl-4 col-xl-4  col-lg-6  col-md-9 col-sm-12 my-4" style="margin:0 auto">
        <div id="verify">

            <h2 class="text-center"> {{ __('myauth.emailv') }} </h2>
            <div>

                <br>

         
                        @if(Session::has('msg'))
                        <span class="btn btn-primary text-center">
                           {{Session::get('msg')}}
                        </span><br><br>
                        @endif

                <p class="text-right">

                    <a href="https://{{auth()->user()->email}}" target="_blank" class="btn btn-success"> {{__('myauth.gotomyemail')}} </a>
                </p>

                <br>


                <br>


                <br>
                <p class="text-right" id="sendinfo">
                    {{ __('myauth.sendemailok') }}
                </p>


                <hr>


                <p class="text-center" id="sendwarn">
                    {{ __('myauth.sendwarn') }}
                </p>
 

            </div>


        </div>



     

  <!-- {{config('app.url')}} -->


        <style>
            #verifyform {
                border-radius: 70px 0px 70px;
                background-color: skyblue;
                margin-top: 100px;
                direction: rtl;
            }

            #verify {
                padding: 20px
            }

            #sendinfo {
                color: green;
                font-weight: bold;

            } 
             #sendwarn {
                color: red;
            }
            h2 {
                    color: coral;
                    text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
                }
            #verifyform{
                   box-shadow: 10px 10px 5px gray;
             }
        </style>



    </div>








    @endsection