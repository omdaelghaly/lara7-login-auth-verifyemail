
@extends('layout.auth')


@section('title',__('myauth.changepwd') )


@section('content')


<div >
  


    <div id="verifyform" class="col-xxl-4 col-xl-4  col-lg-6  col-md-9 col-sm-12 my-4" style="margin:0 auto">
    <div id="verify" >



        <h2 class="text-center"> {{__('myauth.changepwd')}} </h2>
     <div >
        

     <br>

                      @if(Session::has('msg'))
                        <div class="btn btn-danger text-center ml-5">
                           {{Session::get('msg')}}
                        </div><br><br>
                        @endif

         <p id="notifyemailsent"  class="text-right btn-success" >    </p>
<br>
         <a id="gotomyemail" href="" target="_blank"  class="btn btn-success"> {{__('myauth.gotomyemail')}}  </a> 
          
       
         <p id="info" style="color:blue"  class="text-center"> {{__('myauth.notifyemaillink')}} </p>
    
        <form class="form-group" id="sendemailpwdform"  >
             
        <input hidden  type="text" value="{{csrf_token()}}" id="token" name="_token">

            <div class="form-group " style="display:flex">
                    <label class="form-label my-auto p-0 ml-3" for="email"><i style="color:green;font-size:30px" class="fa fa-envelope  p-0 m-0"></i> </label>
                    <input class="form-control" name="email" autocomplete="old-email" id="email" type="email" placeholder="  {{ __('myauth.email ')}} " required>
             </div>
                    <center>  <span id="email_error" class="text-danger error"></span> </center>

            
             <br>
                <div class="form-group">
                    <button  class="btn btn-success w-100 form-control" id="sendemailpwdbtn">{{ __('myauth.btnsubmitforgetpwd')}}</button>
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
            $('#gotomyemail').hide(); 
             
                     $("#sendemailpwdbtn").on('click',function (e) {
                       e.preventDefault(); 

              var formdata = new FormData($('#sendemailpwdform')[0]);
      
                 $.ajax({
                       type: 'POST',
                       enctype: 'multipart/form-data',
                       url: "{{ route('sendemailforgetpwd') }}",
                       data:formdata,
                       processData:false,
                       contentType:false,
                       cache:false,
                success: function(data) {
                    if(data.status=='success'){
                        resetinputs();
                        $('#notifyemailsent').text(data.msg);
                        $('#notifyemailsent').show();
                        $('#gotomyemail').attr('href','https://'+data.user['email'])
                        $('#gotomyemail').show();
                        $('#sendemailpwdform').hide();
                        $('#info').hide();

                     }else{
                        $("#email_error").text(data.msg);
                         setTimeout(()=>{
                            $("#email_error").text(" ");
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