<?php

namespace App\Http\Controllers\Api;

use App\Models\CityCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityCategoryResource;
use App\Http\Resources\CityCategoryCollection;
use App\Http\Requests\CityCategoryStoreRequest;
use App\Http\Requests\CityCategoryUpdateRequest;

class CityCategoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', CityCategory::class);

        $search = $request->get('search', '');

        $cityCategories = CityCategory::search($search)
            ->latest()
            ->paginate();

        return new CityCategoryCollection($cityCategories);
    }

    /**
     * @param \App\Http\Requests\CityCategoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityCategoryStoreRequest $request)
    {
        $this->authorize('create', CityCategory::class);

        $validated = $request->validated();

        $cityCategory = CityCategory::create($validated);

        return new CityCategoryResource($cityCategory);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CityCategory $cityCategory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CityCategory $cityCategory)
    {
        $this->authorize('view', $cityCategory);

        return new CityCategoryResource($cityCategory);
    }

    /**
     * @param \App\Http\Requests\CityCategoryUpdateRequest $request
     * @param \App\Models\CityCategory $cityCategory
     * @return \Illuminate\Http\Response
     */
    public function update(
        CityCategoryUpdateRequest $request,
        CityCategory $cityCategory
    ) {
        $this->authorize('update', $cityCategory);

        $validated = $request->validated();

        $cityCategory->update($validated);

        return new CityCategoryResource($cityCategory);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CityCategory $cityCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, CityCategory $cityCategory)
    {
        $this->authorize('delete', $cityCategory);

        $cityCategory->delete();

        return response()->noContent();
    }
}
