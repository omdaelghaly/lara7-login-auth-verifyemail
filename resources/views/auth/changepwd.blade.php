
@extends('layout.auth')


@section('title',__('myauth.changepwdform') )


@section('content')


<div >
  


    <div id="verifyform" class="col-xxl-4 col-xl-4  col-lg-6  col-md-9 col-sm-12 my-4" style="margin:0 auto">
    <div id="verify" >



        <h2 class="text-center"> {{__('myauth.changepwdform')}} </h2>
     <div >

     <br>
              
   
     <p id="xsuccess"  class="text-right btn-success" >    </p>
     <p id="xerror"  class="text-right btn-danger" >    </p>
<br>
          
       
    
        <form class="form-group" id="changepwdform"  >
             
        <input hidden  type="text" value="{{csrf_token()}}" id="token" name="_token" autocomplete="token">
        <input hidden  type="text" value="{{$tokenx}}" id="tokenx" name="tokenx" autocomplete="tokenx">
        <input hidden  type="text" value="{{$emailx}}" id="emailx" name="emailx" autocomplete="emailx">

          
               <div class="form-group " style="display:flex">
                    <label class="form-label my-auto p-0 ml-3" for="password"><i style="color:green;font-size:30px" class="fa fa-lock  p-0 m-0"></i>  </label>
                    <input class="form-control" name="password" autocomplete="new-password" id="password" type="password" placeholder=" {{ __('myauth.inputpassword')}} " required>
                </div>
                    <center> <span id="password_error" class="text-danger error"></span> </center>


               <div class="form-group " style="display:flex">
                    <label class="form-label my-auto p-0 ml-3" for="password"><i style="color:green;font-size:30px" class="fa fa-lock  p-0 m-0"></i> </label>
                    <input type="password" autocomplete="new-password" name="confirmpwd" id="confirmpwd" class="form-control" placeholder="  {{ __('myauth.inputconfirmpassword')}} " required>
                </div>
                    <center>  <span id="confirmpwd_error" class="text-danger error"></span></center>


             <br>
                <div class="form-group">
                    <button  class="btn btn-success w-100 form-control" id="savenewpwd">{{ __('myauth.savenewpwd')}}</button>
                </div>
        </form>


            <center>
                <a href="/login" > <h10>{{__('myauth.login')}}</h10>  </a>
            </center>
    </div>
    </div>


  
</div>


@endsection


@section('style')
    
<style>
#verifyform{
    border-radius: 70px 0px 70px ;
    background-color: skyblue;
    margin-top:100px;
    direction: rtl;
    box-shadow: 10px 10px 5px gray;
   
    
}
#verify{
    padding:20px
}
.form-label{
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
    
<script>
        $(document).ready(()=>{
            $('#notifyemailsent').hide();
             
                     $("#savenewpwd").on('click',function (e) {
                       e.preventDefault(); 

              var formdata = new FormData($('#changepwdform')[0]);
      
                 $.ajax({
                       type: 'POST',
                       enctype: 'multipart/form-data',
                       url: "{{ route('savenewpassword') }}",
                       data:formdata,
                       processData:false,
                       contentType:false,
                       cache:false,
                                success: function(data) {
                                              if(data.status=='success'){
                                                       resetinputs();
                                                       console.log('changepwdok');
                                                       $('#xsuccess').text(data.msg);
                                                          setTimeout(()=>{
                                                             $("#xsuccess").text(" ");
                                                             window.location.href="/login";
                                                          },5000)
                                                      
                                               }else{
                                                        resetinputs();
                                                        $("#xerror").text(data.msg);
                                                          setTimeout(()=>{
                                                             $("#xerror").text(" ");
                                                          },8000)
                                               }
                                },
      
                });

      });




      function resetinputs(){
                $("#email_error").text(" ");
                       }



        })


</script>


@endsection