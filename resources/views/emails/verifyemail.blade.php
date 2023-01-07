<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
  integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">



 

<div class="container">
  <div  style="background-color: coral;">

    <div class="text-center">
      <p>
        <h2>thanks for joining us ,keep close . </h2>
      </p>
   </div>

    </div>
    <img class="w-100 " style="height:200px;width:100%;padding:0;margin:0 ;"
      src="https://ak.picdn.net/shutterstock/videos/1070093431/thumb/7.jpg?ip=x480" alt="" srcset="">
  </div>


<div ckass="text-center;">
   <h1>Dear, {{$user->name}}</h1>
 
  <a type="submit" target="_blank"
    href="{{ config('app.url')}}/callback_ve/e/{{$user->email}}/t/{{$user->getverifyuser->token}}"
  style="color:mediumblue; "> 
  <h3>verify your email </h3>
  
  </a>

</div>


</div>

</div>














<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>