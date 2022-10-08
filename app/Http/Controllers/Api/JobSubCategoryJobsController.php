<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\JobSubCategory;
use App\Http\Resources\JobResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\JobCollection;

class JobSubCategoryJobsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JobSubCategory $jobSubCategory
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, JobSubCategory $jobSubCategory)
    {
        $this->authorize('view', $jobSubCategory);

        $search = $request->get('search', '');

        $jobs = $jobSubCategory
            ->jobs()
            ->search($search)
            ->latest()
            ->paginate();

        return new JobCollection($jobs);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JobSubCategory $jobSubCategory
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, JobSubCategory $jobSubCategory)
    {
        $this->authorize('create', Job::class);

        $validated = $request->validate([
            'image' => ['nullable', 'image', 'max:1024'],
            'title' => ['required', 'max:255', 'string'],
            'description' => ['required', 'max:255', 'string'],
            'job_category_id' => ['required', 'exists:job_categories,id'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $job = $jobSubCategory->jobs()->create($validated);

        return new JobResource($job);
    }
}
