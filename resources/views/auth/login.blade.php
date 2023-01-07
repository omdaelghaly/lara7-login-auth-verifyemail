@extends('layout.auth')

@section('title',__('myauth.login') )

@section('content')

<div>



    <div id="logincontainer" class=" col-xl-4  col-lg-6  col-md-9 col-sm-12 my-2 " style="margin:0 auto">
        <div id="login">

        <span id="vcx"></span>
        <span id="vc"></span>


            <h2 class="text-center"> {{__('myauth.login')}} </h2>

 <br><br>

            <form class="form-group" id="loginform"  method="POST"  action="\newlogin" enctype="multipart/form-data">


            <input hidden  type="text" value="{{csrf_token()}}" id="token" name="_token">

               <div class="form-group " style="display:flex">
                    <label class="form-label my-auto p-0 ml-3" for="email"><i style="color:green;font-size:30px" class="fa fa-envelope  p-0 m-0"></i> </label>
                    <input class="form-control" autocomplete="email" type="email" name="email" type="email" id="email" placeholder= "{{__('myauth.email ')}}" required>
                </div>
                    <center>  <span id="email_error" class="text-danger error"></span> </center>


               <div class="form-group " style="display:flex">
                    <label class="form-label my-auto p-0 ml-3" for="password"><i style="color:green;font-size:30px" class="fa fa-lock  p-0 m-0"></i> </label>
                    <input class="form-control" autocomplete="new-password" name="password" type="password" id="password" placeholder="  {{__('myauth.inputpassword')}}  " required>
                </div>
                    <center>  <span id="password_error" class="text-danger error"></span> </center>


    <br>

                <div class="form-group">
                    <button type="submit" class="btn btn-success w-100 form-control"  id="loginbtn">  {{__('myauth.login')}}  </button>
                </div>
            </form>

            <br>
            <a href="/forgetpwd">  {{__('myauth.forgetmypassword')}}   </a>
            <br><br>
            <center>
                <a href="/register" class="dropdown-item"> {{__('myauth.doesthaveaccount')}}     </a>
            </center>



        </div>
    </div>
</div>

@endsection

@section('style')
<style>
    #logincontainer {
        border-radius: 70px 0px 70px;
        background-color: skyblue;
        margin-top: 100px;
        direction: rtl;
        box-shadow: 10px 10px 5px gray;

    }

    #login {
        padding: 20px
    }

    .form-label {
        float: right;
    }
    h2 {
  color: coral;
  text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
}
.form-control{
    box-shadow: 10px 10px 5px gray;

}
</style>
  
@endsection

@section('script')


<script type="text/javascript">
 
        $(document).ready(function(){

             $("#loginbtn").on('click',function (e) {
                 e.preventDefault(); 
                
                 var formdata = new FormData($('#loginform')[0]);
      
                 $.ajax({
                       type: 'POST',
                       enctype: 'multipart/form-data',
                       url: "{{ route('newlogin') }}",
                       data:formdata,
                       processData:false,
                       contentType:false,
                       cache:false,
                success: function(data) {
                       resetinputs();
                       stopcountfuc();
                       console.log(data)
                       if(data.status=='erroremail')
                       {
                        $("#email_error" ).text(data.msg);
                       }else{
                              if(data.status =='errorpassword'){
                                  $("#password_error" ).text(data.msg);
                              }else{
                                   window.location.href="/";
                             }
                           }
                },
                error:function(reject){
                var err= $.parseJSON(reject.responseText);
                resetinputs();
                $.each(err.errors,function(key,val){
                    $("#"+key+"_error" ).text(val[0]);
                    console.log(key+'='+val[0])
                });
                console.log(err.errors)
               }
        });

      });




    //realtime validation    
       var timebetween=0 ;
       var countfunc;
       
       
            $(":input").on("keyup",function(){
                countfunc = setInterval(()=>{
                   // $('#vcx').text(timebetween);
                  timebetween++; 
                  if(timebetween >= 3){
                     

               // if time wait more than 2 min   
                 stopcountfuc();
                var formdata = new FormData($('#loginform')[0]);
      
             $.ajax({
                    type: 'POST',
                    enctype: 'multipart/form-data',
                    url: "{{ route('realtimevalidatelogin') }}",
                    data:formdata,
                    processData:false,
                    contentType:false,
                    cache:false,
                success: function(data) {
                    resetinputs();
                   stopcountfuc();
                 },
                error:function(reject){
                     var err= $.parseJSON(reject.responseText);
                     resetinputs();
                     stopcountfuc();
                     $.each(err.errors,function(key,val){
                         if($("#"+key).val() ){
                             if(val[0]){
                                $("#"+key+"_error" ).text(val[0]);
                             }else{
                                 resetinputs();
                             }
                            
                         }
                     //console.log(key+'='+val[0])
                     });
                      // console.log(err.errors)
                  },
           });
    

           
                }//end if 

            
            },1000)

            });


 //// stop count and start new one
           $(":input").on("keydown",function(e){
               stopcountfuc();
              
            });

    //stopcountfunc
    function stopcountfuc(){
        clearInterval(countfunc);
        timebetween=0 ;
    }            

    ///reset inputs
    function resetinputs(){
        $("#email_error").text(" ");
        $("#password_error").text(" ");
    }

    


        
});

</script>
    
@endsection
