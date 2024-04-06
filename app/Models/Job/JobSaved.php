<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSaved extends Model
{
    use HasFactory;

    protected $table = 'jobsaved';


    protected $fillable = [
        'id',
        'singleJob_id',
        'user_id',
        'singleJob_image',
        'singleJob_title',
        'company_name',
        'singleJob_region',
        'singleJob_type',
       
    ];

    public $timestamps = true;
}
