<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobSubCategory;
use App\Http\Requests\JobSubCategoryStoreRequest;
use App\Http\Requests\JobSubCategoryUpdateRequest;

class JobSubCategoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', JobSubCategory::class);

        $search = $request->get('search', '');

        $jobSubCategories = JobSubCategory::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.job_sub_categories.index',
            compact('jobSubCategories', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', JobSubCategory::class);

        return view('app.job_sub_categories.create');
    }

    /**
     * @param \App\Http\Requests\JobSubCategoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobSubCategoryStoreRequest $request)
    {
        $this->authorize('create', JobSubCategory::class);

        $validated = $request->validated();

        $jobSubCategory = JobSubCategory::create($validated);

        return redirect()
            ->route('job-sub-categories.edit', $jobSubCategory)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JobSubCategory $jobSubCategory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, JobSubCategory $jobSubCategory)
    {
        $this->authorize('view', $jobSubCategory);

        return view('app.job_sub_categories.show', compact('jobSubCategory'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JobSubCategory $jobSubCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, JobSubCategory $jobSubCategory)
    {
        $this->authorize('update', $jobSubCategory);

        return view('app.job_sub_categories.edit', compact('jobSubCategory'));
    }

    /**
     * @param \App\Http\Requests\JobSubCategoryUpdateRequest $request
     * @param \App\Models\JobSubCategory $jobSubCategory
     * @return \Illuminate\Http\Response
     */
    public function update(
        JobSubCategoryUpdateRequest $request,
        JobSubCategory $jobSubCategory
    ) {
        $this->authorize('update', $jobSubCategory);

        $validated = $request->validated();

        $jobSubCategory->update($validated);

        return redirect()
            ->route('job-sub-categories.edit', $jobSubCategory)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JobSubCategory $jobSubCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, JobSubCategory $jobSubCategory)
    {
        $this->authorize('delete', $jobSubCategory);

        $jobSubCategory->delete();

        return redirect()
            ->route('job-sub-categories.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
