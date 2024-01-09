<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{

    use HasFactory, Notifiable, HasApiTokens;


    protected $guarded = [] ;


    public function profile(){
      return $this->hasOne(Profile::class , 'user_id');
    }

    //user has nany skills
    public function skills(){
      return $this->hasMany(Skills::class , 'user_id');
    }

    //user has nany tasks
    public function tasks(){
        return $this->hasMany(TaskUser::class , 'user_id');
    }











    protected $hidden = [
        'password',
        'remember_token',
    ];



    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
