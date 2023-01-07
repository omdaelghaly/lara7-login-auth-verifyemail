<?php

return [

    
     'name.required'=>'الاسم مطلوب',
     'name.min'=>'الحد الادنى هو 5 حروف',
     'name.max'=>'الحد الاقصى هو 40 حروف',
     'email.required'=>'الايميل مطلوب',
     'email.email'=>'اكتب ايميل صحيح',
     'email.unique'=>'هذا الايميل موجود ',
     'email.max'=>' الحد الاقصى هو 30 حروف ورقم',
     'password.required'=>'كلمة المرور مطلوبة',
     'password.min'=>'الحد الادنى لكلمة المرور 5 احرف او ارقام ',
     'password.max'=>'  الحد الاقصى هو 20 حرف او رقم',
     'password.same'=>'لابد ان تكون كلمتا المرور متطابقتان',
     'confirmpwd.same'=>'لابد ان تكون كلمتا المرور متطابقتان',
     'confirmpwd.required'=>'تاكيد كلمة المرور مطلوب',
     'confirmpwd.min'=>'الحد الادنى لكلمة المرور 5 احرف او ارقام ',

 //register page

       'register'=>'التسجيل ',
       'notifysuccess'=> ' تم التسجيل بنجاح ',
       'notifyerror'  => '    هناك خطا فى التسجيل  . حاول مرة اخرى  ',
       'name'   => ' الاسم',
       'email '=> ' الايميل',
       'inputpassword' => 'كلمة المرور ',
       'inputconfirmpassword'=>' تاكيد كلمة المرور ' ,
       'alreadyhaveaccount'=> ' لديا حساب ... تسجيل الدخول',
       'btnsubmitregister'=>' التسجيل ',




 //login page

       'login'=>'تسجيل الدخول ',
       'forgetmypassword'=> '   نسيت كلمة المرور   ',
       'doesthaveaccount' => '   ليس لديا حساب.. التسجيل ' ,
 

//forget password
        'changepwd' => ' تغيير كلمة المرور  ',
        'btnsubmitforgetpwd'  => ' ارسال  ',
        'emailnotexist'=>'هذا الايميل غير موجود',
        'emailsentpwd' =>' تم ارسال رابط تغير كلمة المرور بنجاح  ',
         'notifyemaillink' => 'اكتب ايميلك وسيتم ارسال رابط تغيير كلمة المرور الى ايميلك',
         'gotomyemail' =>'الذهاب الى الايميل الخاص بى',
         'errorpassword' => 'هناك خطا فى كلمة المرور ',
         

//verifyemail
          'emailv'=> 'تفعيل الايميل '  ,
          'gotomyemail'=> 'اذهب الى الايميل الخاص بى ',
          'sendagain' => ' ارسال مرة اخرى',
          'sendemailok'=>' تم ارسال رابط تفعيل حسابك بنجاح ... اذهب الى الايميل الخاص بك ثم اضغط على الرابط',
          'sendwarn' =>' هذا الرابط صالح لمدة ساعة',
          'tokenexpired'=> ' انتهت صلاحية هذا الرابط... وتم ارسال رابط جديد ',
          'linkwrong'=> ' هناك خطا فى الرابط...  وتم ارسال رابط جديد ',
          'linkwrongnew'=> ' هناك خطا فى الرابط...  ارسل رابط جديد ',
          'sendlinkfirst'  =>' هناك خطا فى الرابط ... قم بارسال الرابط الى ايميلك',
//
          'changepwdform' => 'استمارة تغيير كلمة المرور  ',
          'savenewpwd'=>' حفظ كلمة المرور الجديدة',
          'linkexpired'=> ' انتهت صلاحية هذا الرابط ... ارسل رابط جديد ',
          'mailthanks'=> '  شكرا لاستخدامك موقعنا ',
          'cliklinkpwd'=> '  اضغط على الرابط لتغيير كلمة المرور ',
          
//save new password changepwdpage
            'linkwrong2'=> ' هناك خطا فى البيانات يجب عليك اعادة ارسال رابط جديد الى ايميلك او المحاولة مرة اخرى' ,
            'linkdamage'=> '  هناك خطا فى الرابط قم بارسال رابط جديد ',         
             'changepwdok'=> ' تم تغيير كلمة المرور بنجاح  ',














    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
