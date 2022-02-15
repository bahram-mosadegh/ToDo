<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];




    public static function UploadAvatar($image){

        auth()->user()->DeleteOldImage();

        $filename = $image->getClientOriginalName();
        $image->storeas('images',$filename ,'public');
        auth()->user()->update(['avatar'=>$filename]);

    }


    protected function DeleteOldImage(){

        if($this->avatar){
        storage::delete('/public/images/'.auth()->user()->avatar);
        }
    }

    // public function setPasswordAttribute($password){

    //     $this->attributes['password'] = bcrypt($password);

    // }

    // public function getNameAttribute($name){

    //     return 'my name is: '.ucfirst($name);
    // }

    public function todos(){
        return $this->hasMany(Todo::class);
    }

}
