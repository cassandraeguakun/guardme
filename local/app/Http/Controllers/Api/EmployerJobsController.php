<?php

namespace Responsive\Http\Controllers\Api;

use Responsive\Feedback;
use Responsive\Http\Traits\JobsTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Responsive\Http\Controllers\Controller;
use Responsive\Job;
use Responsive\JobApplication;
use Responsive\Transaction;
use Responsive\User;
use Responsive\Businesscategory;
use Responsive\SecurityCategory;
use Responsive\Events\JobHiredApplicationMarkedAsComplete;
use Responsive\Events\AwardJob;

class EmployerJobsController extends Controller {


	/**
	 * @param $id
	 *$id= job id
	 *
	 * @return mixed
	 */
	public function JobApplications( $id ) {


		$job = auth()->user()->jobs()->where( 'id', $id )->get();
		if ( count( $job ) == 0 ) {
			return response()->json(403);
		}

		$applications=DB::table('job_applications')
							->where('job_id',$id)
							->leftJoin( 'users', 'job_applications.applied_by', '=', 'users.id' )
							->select('users.name','users.photo','job_applications.created_at','job_applications.is_hired','job_applications.application_description')
							->get();



		return response()->json($applications);
		dd( $user );
		$jobs  = DB::table( 'job_applications' )
		           ->where( 'applied_by', '=', $user->id )
		           ->leftJoin( 'security_jobs', 'job_applications.job_id', '=', 'security_jobs.id' )
		           ->select( 'security_jobs.title', 'job_applications.created_at' )
		           ->get()->toArray();
		$total = count( $jobs );

		return response()->json( $jobs, 200 );
	}
}
