<?php
namespace Responsive;
use Illuminate\Database\Eloquent\Model;
class SavedJob extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'saved_jobs';

    public function getFreelancerSavedJob(){
        return $this->hasMany( Job::class ,'id' , 'job_id');
    }
}