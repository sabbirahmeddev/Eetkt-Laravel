<?php

namespace App\Http\Controllers;

use App\Models\JobCategory;
use Illuminate\Http\Request;
use App\Http\Requests\JobCategoryStoreRequest;
use App\Http\Requests\JobCategoryUpdateRequest;

class JobCategoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', JobCategory::class);

        $search = $request->get('search', '');

        $jobCategories = JobCategory::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.job_categories.index',
            compact('jobCategories', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', JobCategory::class);

        return view('app.job_categories.create');
    }

    /**
     * @param \App\Http\Requests\JobCategoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobCategoryStoreRequest $request)
    {
        $this->authorize('create', JobCategory::class);

        $validated = $request->validated();

        $jobCategory = JobCategory::create($validated);

        return redirect()
            ->route('job-categories.edit', $jobCategory)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JobCategory $jobCategory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, JobCategory $jobCategory)
    {
        $this->authorize('view', $jobCategory);

        return view('app.job_categories.show', compact('jobCategory'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JobCategory $jobCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, JobCategory $jobCategory)
    {
        $this->authorize('update', $jobCategory);

        return view('app.job_categories.edit', compact('jobCategory'));
    }

    /**
     * @param \App\Http\Requests\JobCategoryUpdateRequest $request
     * @param \App\Models\JobCategory $jobCategory
     * @return \Illuminate\Http\Response
     */
    public function update(
        JobCategoryUpdateRequest $request,
        JobCategory $jobCategory
    ) {
        $this->authorize('update', $jobCategory);

        $validated = $request->validated();

        $jobCategory->update($validated);

        return redirect()
            ->route('job-categories.edit', $jobCategory)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JobCategory $jobCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, JobCategory $jobCategory)
    {
        $this->authorize('delete', $jobCategory);

        $jobCategory->delete();

        return redirect()
            ->route('job-categories.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
