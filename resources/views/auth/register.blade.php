@extends('layout.auth')




@section('title',__('myauth.register') )

@section('content')

<div>



    <div id="registercontainer" class=" col-xl-4  col-lg-6  col-md-9 col-sm-12 my-2" style="margin:0 auto">
        <div id="register">




            <h2 class="text-center"> {{__('myauth.register')}}    </h2>

<br><br>
            <p id="notifysuccess" class="btn-success text-center" >  {{__('myauth.notifysuccess')}}   </p>
            <p id="notifyerror" class="btn-success text-center" >  {{__('myauth.notifyerror')  }}</p>
            
              <form id="newregister" class="form-group" method="POST"  action="" enctype="multipart/form-data"  >

               <input hidden  type="text" value="{{csrf_token()}}" id="token" name="_token">

                <div class="form-group" style="display:flex">
                    <label  class="form-label my-auto  p-0 ml-3" for="name"><i style="color:green;font-size:30px" class="fa fa-user" p-0 m-0"></i> </label>
                    <input type="text" name="name" id="name" class="form-control" placeholder=" {{ __('myauth.name')}}" id="name">
                </div>
                    <center>  <span id="name_error" class="text-danger error"></span> </center>


                <div class="form-group " style="display:flex">
                    <label class="form-label my-auto p-0 ml-3" for="email"><i style="color:green;font-size:30px" class="fa fa-envelope  p-0 m-0"></i></label>
                    <input class="form-control" name="email" autocomplete="old-email" id="email" type="email" placeholder="  {{ __('myauth.email ')}} " required>
                </div>
                    <center>  <span id="email_error" class="text-danger error"></span> </center>


                <div class="form-group " style="display:flex">
                    <label class="form-label my-auto p-0 ml-3" for="password"><i style="color:green;font-size:30px" class="fa fa-lock  p-0 m-0"></i> </label>
                    <input class="form-control" name="password" autocomplete="new-password" id="password" type="password" placeholder=" {{ __('myauth.inputpassword')}} " required>
                </div>
                    <center> <span id="password_error" class="text-danger error"></span> </center>


                <div class="form-group" style="display:flex" >
                    <label class="form-label my-auto p-0 ml-3" for="confirmpwd"><i style="color:green;font-size:30px" class="fa fa-lock  p-0 m-0"></i></label>
                    <input type="password" autocomplete="new-password" name="confirmpwd" id="confirmpwd" class="form-control" placeholder="  {{ __('myauth.inputconfirmpassword')}} " required>
                </div>
                    <center>  <span id="confirmpwd_error" class="text-danger error"></span></center>


                <br>
                <div class="form-group">
                    <button  class="btn btn-success w-100 form-control" id="registerbtn">{{ __('myauth.btnsubmitregister')}}</button>
                </div>
            </form>


            <br>
            <center>
                <a href="/login" class="dropdown-item">   {{ __('myauth.alreadyhaveaccount')}} </a>
            </center>



        </div>
    </div>
</div>

@endsection

@section('style')
<style>
    #registercontainer {
        border-radius: 70px 0px 70px;
        background-color: skyblue;
        margin-top: 100px;
        direction: rtl;
        box-shadow: 10px 10px 5px #aaaaaa;

    }

    #register {
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
             $("#notifysuccess").hide();
             $("#notifyerror").hide();

        $(document).ready(function(){

             //register
             $("#registerbtn").on('click',function (e) {
                 e.preventDefault(); 
                
                 var formdata = new FormData($('#newregister')[0]);
      
                 $.ajax({
                       type: 'POST',
                       enctype: 'multipart/form-data',
                       url: "{{ route('newregister') }}",
                       data:formdata,
                       processData:false,
                       contentType:false,
                       cache:false,
                success: function(data) {
                    if(data.status=='success'){
                        resetinputs();
                        $("#notifyerror").hide();
                        $('#notifysuccess').show();
                        setTimeout(()=>{
                            window.location.href="/";
                        },2000)
                    }else{
                     console.log(data)
                        $('#notifyerror').show();
                    }
                },
                error:function(reject){
                      var err= $.parseJSON(reject.responseText);
                       resetinputs();
                     $.each(err.errors,function(key,val){
                       $("#"+key+"_error" ).text(val[0]);
                  //  console.log(key+'='+val[0])
                      });
               // console.log(err.errors)
               }
        });

    });




    //realtime validation  
       
      var timebetween=0 ;
       var countfunc;
            $(":input").on("keyup",function(){
                countfunc = setInterval(()=>{
                // $('#infonotify').text(timebetween);
                  timebetween++;
               // if time wait more than 3 min   
           if(timebetween > 2){
                    clearInterval(countfunc);
                    timebetween=0 ;
                var formdata = new FormData($('#newregister')[0]);
      $.ajax({
             type: 'POST',
             enctype: 'multipart/form-data',
             url: "{{ route('realtimevalidateregister') }}",
             data:formdata,
             processData:false,
             contentType:false,
             cache:false,
         success: function(data) {
            clearInterval(countfunc);
                    timebetween=0 ;
          },
         error:function(reject){
              var err= $.parseJSON(reject.responseText);
              resetinputs();
              $.each(err.errors,function(key,val){
                  if($("#"+key).val() ){
                      if(val[0]){
                         $("#"+key+"_error" ).text(val[0]);
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
            $(":input").on("keydown",function(){
                   clearInterval(countfunc);
                    timebetween=0 ;
                });


    ///reset inputs
            function resetinputs(){
                $("#name_error").text(" ");
                $("#email_error").text(" ");
                $("#password_error").text(" ");
                $("#confirmpwd_error").text(" ");
            }

            $(":input").on("keyup",function(){
            if($("#password").val() == $("#confirmpwd").val() )
            {
                $("#password_error").text(" ");
                $("#confirmpwd_error").text(" ");
            }
            })
    


        
});

</script>

@endsection