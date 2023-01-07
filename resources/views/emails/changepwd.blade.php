


@component('mail::message')


<h2>Dear, {{$user->name}}</h2>
<p>{{__('myauth.mailthanks')}}</p>
<p>{{__('myauth.cliklinkpwd')}}</p>


@component('mail::button',['url'=> config('app.url') ."/callback_pwd/e/" .$user->email ."/t/" .$user->getverifyuser->token ])
<h3>{{__('myauth.changepwd')}} </h3>

@endcomponent
 





  
@endcomponent










<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>