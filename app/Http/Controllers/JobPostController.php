<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;
use Inertia\Inertia;


class JobPostController extends Controller

{
    public Job $job;
    public function index()
    {
        return Inertia::render('Jobs/Index', [
            'jobs' => JobPost::latest()->get(),
        ]);
    }

    public function store(Request $request)

    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Job::create([
            ...$validated,
            'user_id' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Job posted successfully.');
    }

    public function show(Job $job)
    {
        return Inertia::render('Jobs/Show', [
            'job' => $job->load('applications'),
        ]);
    }
}
