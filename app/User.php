<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use Notifiable;


    protected $fillable = [
    	'name', 'email', 'password',
    ];

    protected $hidden = [
    	'password', 'remember_token',
    ];


    protected $casts = [
    	'email_verified_at' => 'datetime',
    ];



    public function article(){
    	
    	return $this->hasMany(Article::class);
  
    }
    
   
    public function comment(){
    	
    	return $this->hasMany(Comment::class);

    }
 
}
