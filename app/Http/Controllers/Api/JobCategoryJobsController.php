<?php

namespace App\Http\Controllers\Api;

use App\Models\JobCategory;
use Illuminate\Http\Request;
use App\Http\Resources\JobResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\JobCollection;

class JobCategoryJobsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JobCategory $jobCategory
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, JobCategory $jobCategory)
    {
        $this->authorize('view', $jobCategory);

        $search = $request->get('search', '');

        $jobs = $jobCategory
            ->jobs()
            ->search($search)
            ->latest()
            ->paginate();

        return new JobCollection($jobs);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JobCategory $jobCategory
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, JobCategory $jobCategory)
    {
        $this->authorize('create', Job::class);

        $validated = $request->validate([
            'image' => ['nullable', 'image', 'max:1024'],
            'title' => ['required', 'max:255', 'string'],
            'description' => ['required', 'max:255', 'string'],
            'job_sub_category_id' => [
                'required',
                'exists:job_sub_categories,id',
            ],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $job = $jobCategory->jobs()->create($validated);

        return new JobResource($job);
    }
}
