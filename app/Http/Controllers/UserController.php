<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\SUPPORT\FACADES\DB;
use App\Models\User;


class UserController extends Controller
{


    public function UploadAvatar(Request $request){

        if($request->hasfile('image')){
            user::UploadAvatar($request->image);
            return redirect()->back()->with('message','avatar uploaded.');
        }

    return redirect()->back()->with('error','avatar not uploaded.');

    }


    public function index(){

    //raw query
    	// DB::insert('insert into users(name,email,password) values(?,?,?)',
    	// ['bahram','bahram@gmail.com','123456']);

    	// DB::update('update users set name = ? where id = 1',['shahram']);

    	// DB::delete('delete from users where id = 1');

    	// $users = DB::select('select * from users');
    	// return $users;

	//elequent model
    	// $user = new user();
    	// $user->name = 'bahbah';
    	// $user->email = 'bahbah@gmail.com';
    	// $user->password = bcrypt('pass123');
    	// $user->save();

    	// user::where('id',3)->update(['name'=>'bahraaaaaaaaaaaam']);

    	// $user = User::all();
    	// return $user;

    	// User::where('id',2)->delete();

    ///////


    	// $data = [
    	// 'name'=>'elon',
    	// 'email'=>'elon@gmail.com',
    	// 'password'=>'p123elon'
    	// ];

    	// user::create($data);

    	$user = user::all();
    	return $user;


    	return view('home');
    }
}