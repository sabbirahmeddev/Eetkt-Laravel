<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobCategory;
use Illuminate\Http\Request;
use App\Models\JobSubCategory;
use App\Http\Requests\JobStoreRequest;
use App\Http\Requests\JobUpdateRequest;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Job::class);

        $search = $request->get('search', '');

        $jobs = Job::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.jobs.index', compact('jobs', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Job::class);

        $jobCategories = JobCategory::pluck('id', 'id');
        $jobSubCategories = JobSubCategory::pluck('id', 'id');

        return view(
            'app.jobs.create',
            compact('jobCategories', 'jobSubCategories')
        );
    }

    /**
     * @param \App\Http\Requests\JobStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobStoreRequest $request)
    {
        $this->authorize('create', Job::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $job = Job::create($validated);

        return redirect()
            ->route('jobs.edit', $job)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Job $job
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Job $job)
    {
        $this->authorize('view', $job);

        return view('app.jobs.show', compact('job'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Job $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Job $job)
    {
        $this->authorize('update', $job);

        $jobCategories = JobCategory::pluck('id', 'id');
        $jobSubCategories = JobSubCategory::pluck('id', 'id');

        return view(
            'app.jobs.edit',
            compact('job', 'jobCategories', 'jobSubCategories')
        );
    }

    /**
     * @param \App\Http\Requests\JobUpdateRequest $request
     * @param \App\Models\Job $job
     * @return \Illuminate\Http\Response
     */
    public function update(JobUpdateRequest $request, Job $job)
    {
        $this->authorize('update', $job);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($job->image) {
                Storage::delete($job->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $job->update($validated);

        return redirect()
            ->route('jobs.edit', $job)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Job $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Job $job)
    {
        $this->authorize('delete', $job);

        if ($job->image) {
            Storage::delete($job->image);
        }

        $job->delete();

        return redirect()
            ->route('jobs.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
