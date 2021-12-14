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
        Joblist::store($request);

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
        Joblist::storeUpdate($request, $id);

        return redirect()->route('list.job')->with('success', 'Job is successfully updated');
    }

    public function destroy($id)
    {
        $jobs = Joblist::find($id);
        $jobs->delete();

        return redirect()->route('list.job')->with('success', 'Job is successfully deleted');
    }
}
