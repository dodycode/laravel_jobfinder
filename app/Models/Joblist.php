<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joblist extends Model
{
    use HasFactory;

    protected $table = 'joblists';
    protected $fillable = [
        'company_name',
        'job_name',
        'category',
        'description',
        'address',
    ];
}
