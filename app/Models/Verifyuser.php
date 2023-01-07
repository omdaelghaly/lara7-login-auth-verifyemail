<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Verifyuser extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'token', 'expire','code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ 
        'created_at','updated_at'
     ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [    ];




    public function getuser(){
        return $this->blongsTo(User::class,'user_id', 'id');
       }



}
