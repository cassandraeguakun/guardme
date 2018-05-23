<?php

namespace Responsive;

use Illuminate\Database\Eloquent\Model;
use Responsive\Job;
class SecurityJobsSchedule extends Model
{
    //
    protected $table = 'security_jobs_schedule';

    protected $fillable = ['start', 'end', 'job_id'];

    public $timestamps = false;

    public function job() {
        return $this->belongsTo(Job::class);
    }
}
