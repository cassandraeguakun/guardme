<?php
namespace Responsive;

use Illuminate\Http\Request;
use Responsive\Http\Controllers\Auth ;
use Illuminate\Database\Eloquent\Model;
namespace Responsive\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use \Responsive\Transaction;
use Responsive\Job ;

class test {

    public function getTransactionsOfJobs(){
//       $user_id = Auth::user()->id;

        // $my_jobs = Job::getMyJobs()->get();
        $user_transactions = Transaction::with(['getTransactionJob'])->where('user_id' , 1)->get();

        //echo json_encode($user_transactions);
        return response()
            ->json($user_transactions , 200);

    }


    public function getJobTransactionDetails($id){
        $wallet_data = Transaction::where('job_id' , $id)->get();
        //  $data = ['name'=> 'maysoon' , 'age'=> 26] ;
        //echo json_encode($data);

        return response()
            ->json($wallet_data, 200);

    }

} 