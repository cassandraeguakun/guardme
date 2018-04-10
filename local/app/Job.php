<?php

namespace Responsive;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //Table name
    protected $table = 'jobs';


    //primary key
    public $primaryKey = 'id';

    //TimeStamps
    protected $timeStamps = true;

}
