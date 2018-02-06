<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */



	protected $table = 'users';

	static function addUser($inputs){
       $user = new User();
       $user->first_name = $inputs['firstname'];
       $user->last_name = $inputs['lastname'];
       $user->gender = $inputs['Gender'];
       $user->email= $inputs['emailaddress'];
	   $user->password = Hash::make($inputs['password']); 
       $user->mobile_no= $inputs['mobilenumber'];       
       $user->save(); // returns false
       return $user;
       
    }

    static function getAllUsersInfo(){
        return User::get();
    }


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

}
