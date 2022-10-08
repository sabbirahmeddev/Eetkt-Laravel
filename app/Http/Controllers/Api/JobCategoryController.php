<?php

namespace App\Http\Controllers\Api;

use App\Models\JobCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\JobCategoryResource;
use App\Http\Resources\JobCategoryCollection;
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
            ->paginate();

        return new JobCategoryCollection($jobCategories);
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

        return new JobCategoryResource($jobCategory);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JobCategory $jobCategory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, JobCategory $jobCategory)
    {
        $this->authorize('view', $jobCategory);

        return new JobCategoryResource($jobCategory);
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

        return new JobCategoryResource($jobCategory);
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

        return response()->noContent();
    }
}
