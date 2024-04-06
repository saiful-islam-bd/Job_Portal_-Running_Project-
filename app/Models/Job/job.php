<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    use HasFactory;

    protected $table = 'jobs';


    protected $fillable = [
        'id',
        'image',
        'job_title',
        'category',
        'company_name',
        'job_region',
        'job_type',
        'vacancy',
        'experience',
        'salary',
        'gender',
        'application_deadline',
        'job_description',
        'responsibilities',
        'education_&_experience',
        'other_benifits',
    ];

    public $timestamps = true;
    
}
