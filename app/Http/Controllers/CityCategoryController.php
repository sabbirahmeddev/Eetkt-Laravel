<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\CityCategory;
use Illuminate\Http\Request;
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
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.city_categories.index',
            compact('cityCategories', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', CityCategory::class);

        $cities = City::pluck('name', 'id');

        return view('app.city_categories.create', compact('cities'));
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

        return redirect()
            ->route('city-categories.edit', $cityCategory)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CityCategory $cityCategory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CityCategory $cityCategory)
    {
        $this->authorize('view', $cityCategory);

        return view('app.city_categories.show', compact('cityCategory'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CityCategory $cityCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, CityCategory $cityCategory)
    {
        $this->authorize('update', $cityCategory);

        $cities = City::pluck('name', 'id');

        return view(
            'app.city_categories.edit',
            compact('cityCategory', 'cities')
        );
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

        return redirect()
            ->route('city-categories.edit', $cityCategory)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('city-categories.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
