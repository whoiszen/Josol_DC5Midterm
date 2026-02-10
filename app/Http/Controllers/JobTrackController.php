<?php

namespace App\Http\Controllers;

use App\Models\JobTrack;
use App\Models\Job;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JobTrackController extends Controller
{
    public function index()
    {
        return Inertia::render('JobTrack/Index', [
            'job-track' => JobTrack::with('job')
                ->where('user_id', auth()->id())
                ->latest()
                ->get(),
        ]);
    }

    public function store(Request $request, Job $job)
    {
        $request->validate([
            'cover_letter' => 'nullable|string',
        ]);

        Application::create([
            'job_id' => $job->id,
            'user_id' => auth()->id(),
            'cover_letter' => $request->cover_letter,
        ]);

        return redirect()->back()->with('success', 'Application submitted.');
    }

    public function update(Request $request, Application $application)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $application->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Application status updated.');
    }
}

