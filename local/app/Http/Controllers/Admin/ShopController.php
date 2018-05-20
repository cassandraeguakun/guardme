<?php

namespace Responsive\Http\Controllers\Admin;



use File;
use Image;
use Responsive\Businesscategory;
use Responsive\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Auth;
use Mail;

use Responsive\Http\Requests;
use Illuminate\Http\Request;
use Responsive\Shop;
use Responsive\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        $shop = DB::table('shop')
		        ->orderBy('id','desc')
			   ->get();
		
		$data=array('shop' => $shop);

        return view('admin.shop')->with($data);
    }
	
	
	public function showform($id) {


		$editshop = Shop::where('id',$id)->get()->first();
		$b_cats = Businesscategory::all();


	  return view('admin.edit-shop')
		  ->with('editshop',$editshop)
		  ->with('b_cats',$b_cats);

   }
	
	
	
	public function destroy($id) {
		
		$image = DB::table('shop')->where('id', $id)->first();
		$orginalfile=$image->cover_photo;
		$shphoto="/shop/";
       $path = base_path('images'.$shphoto.$orginalfile);
	  File::delete($path);
	  
	  $orginalfile_new=$image->profile_photo;
		$shphoto_new="/shop/";
       $paths = base_path('images'.$shphoto_new.$orginalfile_new);
	  File::delete($paths);
	  
      DB::delete('delete from shop where id = ?',[$id]);
	   
      return back();
      
   }
   
   
   
   
   
   protected function savedata(Request $request)
    {
        
		
		
		 $data = $request->all();
		
		$editid=$data['editid'];
		
		
         
		 
		
			
		$shop_name=$data['shop_name'];
		$shop_address=$data['address'];
		
		$shop_city=$data['city'];
		$shop_pin_code=$data['pin_code'];
		
		
		$shop_country=$data['country'];
		$shop_state=$data['state'];
		
		$shop_phone_no=$data['shop_phone_no'];
		$shop_desc=$data['description'];
		
		
		$status=$data['status'];
		$featured=$data['featured'];
		$email_status=$data['email_status'];
		
		
		$site_logo=$data['site_logo'];
		
		$site_name=$data['site_name'];
		
		
		 
		$admin_email_status=1;
		
		
		
		/*$adminmeail = Auth::user()->email;*/
    	 
		
		
		if($editid!="")
		{
			
			
			DB::update('update shop set shop_name="'.$shop_name.'",address="'.$shop_address.'",city="'.$shop_city.'",pin_code="'.$shop_pin_code.'",country="'.$shop_country.'",
			state="'.$shop_state.'",shop_phone_no="'.$shop_phone_no.'",description="'.$shop_desc.'",featured="'.$featured.'",
			status="'.$status.'",admin_email_status="'.$admin_email_status.'" where id = ?', [$editid]);
			
					
						
					if($email_status==0)
					{	
				         if($status=="approved")
						{
						Mail::send('admin/shopmail', ['shop_name' => $shop_name, 'address' => $shop_address, 'city' => $shop_city, 'pin_code' => $shop_pin_code, 'country' => $shop_country,
				   'state' => $shop_state, 'shop_phone_no' => $shop_phone_no, 'description' => $shop_desc, 'site_logo' => $site_logo, 'site_name' => $site_name], function ($message)
					{
						$message->subject('Your Shop approved Successfully');
						
						$message->from(Auth::user()->email, 'Admin');

						$message->to(Input::get('show_owner_email'));

					});
						}
			
					}
			
		}
		
		
			
			
			
        
		return redirect('admin/shop');
		
		
		
    }
	
   
	
}