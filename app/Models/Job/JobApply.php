<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApply extends Model
{
    use HasFactory;


    protected $table = 'applications';

    protected $fillable = [
        'id',
        'singleJob_id',
        'user_id',
        'cv',
        'singleJob_image',
        'singleJob_title',
        'company_name',
        'singleJob_region',
        'singleJob_type',
       
    ];

    public $timestamps = true;

}
