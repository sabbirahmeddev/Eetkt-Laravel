<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\JobSubCategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\JobSubCategoryResource;
use App\Http\Resources\JobSubCategoryCollection;
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
            ->paginate();

        return new JobSubCategoryCollection($jobSubCategories);
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

        return new JobSubCategoryResource($jobSubCategory);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JobSubCategory $jobSubCategory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, JobSubCategory $jobSubCategory)
    {
        $this->authorize('view', $jobSubCategory);

        return new JobSubCategoryResource($jobSubCategory);
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

        return new JobSubCategoryResource($jobSubCategory);
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

        return response()->noContent();
    }
}
