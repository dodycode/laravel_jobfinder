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

    public static function store($request)
    {
        $fields = [
            'company_name' => $request->company_name,
            'job_name'     => $request->job_name,
            'category'     => $request->category,
            'address'      => $request->address,
            'description'  => $request->description
        ];

        self::create($fields);
    }

    public static function storeUpdate($request, $id)
    {
        $job = self::find($id);

        $job->company_name = $request->company_name;
        $job->job_name = $request->job_name;
        $job->category = $request->category;
        $job->address = $request->address;
        $job->description = $request->description;
        $job->save();
    }
}
