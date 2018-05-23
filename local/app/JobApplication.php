<?php

namespace Responsive;

use Illuminate\Database\Eloquent\Model;
use DB;

class JobApplication extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'job_applications';
	
	public function job()
    {
        return $this->belongsTo(Job::class,'job_id');
    }

    /**
     * @param $job_id
     * @return mixed
     */
    public function is_applied($job_id) {
        $user_id = auth()->user()->id;
        $res = DB::table($this->table)
            ->where('applied_by', $user_id)
            ->where('job_id', $job_id)->get();
        return count($res);
    }

    /**
     * @param $job_id
     * @return mixed
     */
    public function is_hired($job_id) {
        $user_id = auth()->user()->id;
        $res = DB::table($this->table)
            ->where('applied_by', $user_id)
            ->where('is_hired', 1)
            ->where('job_id', $job_id)->get();
        return count($res);
    }

    public function getJobApplications($id) {
        $user_id = auth()->user()->id;
        $res = DB::table($this->table. ' as ja')
            ->select('u.name as user_name',
                'ja.application_description as description',
                'ja.id',
                'ja.is_hired',
                'u.photo as photo',
                'u.id as u_id',
                'ja.created_at as applied_date'
            )
            ->join('security_jobs as sj', 'sj.id', '=', 'ja.job_id')
            ->join('users as u', 'u.id', '=', 'ja.applied_by')
            ->where('ja.job_id', $id)
            ->where('sj.created_by', $user_id)->get();
        return $res;
    }

    public function getApplicationDetails($application_id) {
        $user_id = auth()->user()->id;
        $res = DB::table($this->table. ' as ja')
            ->select('u.name as user_name',
                'ja.application_description as description',
                'ja.id',
                'sj.title as job_title',
                'sj.description as job_description',
                'ja.is_hired',
                'ja.completion_status',
                'ja.created_at as applied_date'
            )
            ->join('security_jobs as sj', 'sj.id', '=', 'ja.job_id')
            ->join('users as u', 'u.id', '=', 'ja.applied_by')
            ->where('ja.id', $application_id)
            ->where('sj.created_by', $user_id)->get()->first();
        return $res;
    }


    public function getMyApplicationDetails($application_id) {
        $user_id = auth()->user()->id;
        $res = DB::table($this->table. ' as ja')
            ->select('u.name as user_name',
                'ja.application_description as description',
                'ja.id',
                'sj.title as job_title',
                'sj.description as job_description',
                'ja.is_hired',
                'ja.created_at as applied_date'
            )
            ->join('security_jobs as sj', 'sj.id', '=', 'ja.job_id')
            ->join('users as u', 'u.id', '=', 'ja.applied_by')
            ->where('ja.id', $application_id)
            ->where('ja.applied_by', $user_id)->get()->first();
        return $res;
    }

    /**
     * @param $application_id
     * @return array
     */
    public function isEligibleToMarkHired($application_id) {
        $error_message = '';
        $status_code = 200;
        $ja_with_job = JobApplication::with('job')
            ->where('id', $application_id)
            ->get()->first();
        $job = $ja_with_job->job;

        $total_number_of_freelancers = $job->number_of_freelancers;
        $job_hired_applications = JobApplication::where('is_hired', true)
            ->where('job_id', $job->id);
        $number_of_already_hired_freelancers = count($job_hired_applications);
        $vacant_positions = $total_number_of_freelancers - $number_of_already_hired_freelancers;
        $user_id = auth()->user()->id;
        if (!intval($vacant_positions)) {
            $status_code = 500;
            $error_message = 'Sorry, All vacancies for this job are already filled.';
        }
        if ($job->created_by != $user_id) {
            $status_code = 500;
            $error_message = 'You are not authorized to perform this action';
        }
        return ['error_message' => $error_message, 'status_code' => $status_code];
    }

    public function isHired($application_id) {
        $results = DB::table($this->table)
            ->where('id', $application_id)
            ->where('is_hired', 1)->get();
        return count($results);
    }
    public function getMyProposals() {
        $user_id = auth()->user()->id;
        $res = DB::table($this->table .' as ja')
            ->select(
                'sj.title',
                'sj.created_by',
                'ja.application_description as description',
                'ja.is_hired',
                'ja.id',
                'u.photo as photo',
                'sj.title as job_title',
                'sj.description as job_description',
                'sj.id as job_id',
                'ja.created_at as applied_date',
                'u.id as u_id',
                'u.name as user_name',
                'shp.shop_name',
                'shp.profile_photo'
            )
            ->join('security_jobs as sj', 'sj.id', '=', 'ja.job_id')
             ->join('users as u', 'u.id', '=', 'ja.applied_by')
             ->join('shop as shp', 'sj.created_by', '=', 'shp.user_id')
            ->where('ja.applied_by', $user_id)
        ->get();
        return $res;
    }
}
