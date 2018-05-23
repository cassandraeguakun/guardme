<?php
namespace Responsive;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $table = 'address';



   function user(){
   	 return $this->belongsTo(User::class,'user_id');
   }
}
