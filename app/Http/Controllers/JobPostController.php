<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JobPostController extends Controller
{
    public function index()
    {
        return Inertia::render('AvailableJobPosts', [
            'jobs' => JobPost::latest()->get()
        ]);
    }

    public function dashboard()
    {
        return Inertia::render('Dashboard', [
            'jobs' => JobPost::latest()->get()
        ]);
    }
    public function create()
    {
        return Inertia::render('CreateJob');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',

            'description' => 'required',
            'salary' => 'nullable|numeric'
        ]);

        JobPost::create($request->all());

        return redirect()->route('jobs.available');

    }
}
