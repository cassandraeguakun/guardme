<?php
namespace Responsive;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public $table = 'shop';
    public $timestamps = false;


    function owner(){
   	 return $this->belongsTo(User::class,'user_id');
   }

   function bcategory(){
   	 return $this->belongsTo(Businesscategory::class,'business_categoryid');
   }
}
