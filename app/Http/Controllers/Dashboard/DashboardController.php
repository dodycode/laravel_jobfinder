<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Joblist;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $jobs = Joblist::all();
        return view('interfaces.dashboard.index')
            ->withJobs($jobs);
    }

    public function listJob()
    {
        $jobs = Joblist::latest()->paginate(10);
        return view('interfaces.dashboard.listJob')
            ->withJobs($jobs);
    }

    public function addJob()
    {
        return view('interfaces.dashboard.addJob');
    }

    public function storeJob(Request $request)
    {
        $fields = [
            'company_name' => $request->company_name,
            'job_name'     => $request->job_name,
            'category'     => $request->category,
            'address'      => $request->address,
            'description'  => $request->description
        ];

        Joblist::create($fields);

        return redirect()->route('list.job')->with('success', 'Job is successfully created');
    }

    public function editJob($id)
    {
        $jobs = Joblist::find($id);
        return view('interfaces.dashboard.editJob')
            ->withJobs($jobs);
    }

    public function updateJob(Request $request, $id)
    {
        $jobs = Joblist::find($id);

        $fields = [
            'company_name' => $request->company_name,
            'job_name'     => $request->job_name,
            'category'     => $request->category,
            'address'      => $request->address,
            'description'  => $request->description
        ];

        $jobs->update($fields);
        return redirect()->route('list.job')->with('success', 'Job is successfully updated');
    }

    public function destroy($id)
    {
        $jobs = Joblist::find($id);
        $jobs->delete();

        return redirect()->route('list.job')->with('success', 'Job is successfully deleted');
    }
}
