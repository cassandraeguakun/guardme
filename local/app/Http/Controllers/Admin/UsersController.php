<?php

namespace Responsive\Http\Controllers\Admin;



use File;
use Image;
use Responsive\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Responsive\Http\Requests;
use Illuminate\Http\Request;
use Responsive\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        $users = DB::table('users')->orderBy('id','desc')->where('is_phone_verfifed',0)->where('is_email_verfifed',0)->get();

        $emailUnverfiedUsers = DB::table('users')->orderBy('id','desc')->where('is_phone_verfifed',1)->get();

        $phoneUnverfiedUsers = DB::table('users')->orderBy('id','desc')->where('is_email_verfifed',1)->get();

        return view('admin.users', ['users' => $users,'emailUnverfiedUsers' => $emailUnverfiedUsers,'phoneUnverfiedUsers'=>$phoneUnverfiedUsers ]);
    }
	
	
	public function destroy($id) {
		
		$image = DB::table('users')->where('id', $id)->first();
		$orginalfile=$image->photo;
		$userphoto="/userphoto/";
       $path = base_path('images'.$userphoto.$orginalfile);
	  File::delete($path);
	  
	  
		$userdetails = DB::table('users')
		 ->where('id', '=', $id)
		 ->get();
	  
	 $uemail = $userdetails[0]->email;
	 
	  DB::delete('delete from seller_services where user_id = ?',[$id]);
	  DB::delete('delete from rating where email = ?',[$uemail]);
	  DB::delete('delete from booking where user_id = ?',[$id]);
	  
	   DB::delete('delete from shop_gallery where user_id = ?',[$id]);
	   DB::delete('delete from shop where user_id = ?',[$id]);
      DB::delete('delete from users where id!=1 and id = ?',[$id]);
	   
      return back();
      
   }
   	public function verifiedemail($id)
    {
        DB::table('users')->where('id', $id)->limit(1)->update(array('is_email_verfifed' => '1'));
        return redirect()->back()->with('message','success to unverififed this user');

    }
    public function verifiedphone($id)
    {
        DB::table('users')->where('id', $id)->limit(1)->update(array('is_phone_verfifed' => '1'));
        return redirect()->back()->with('message','success to unverififed this user');

    }
	
}