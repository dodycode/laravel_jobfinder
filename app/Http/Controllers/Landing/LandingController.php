<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Classes\TFIDF\TFIDF;

class LandingController extends Controller
{
    public function index()
    {
        return view('interfaces.landing.index');
    }

    public function results(Request $request)
    {
        $filteredJobs = TFIDF::getFilteredJobs($request);

        return view('interfaces.landing.result', compact('filteredJobs'));
    }
}
