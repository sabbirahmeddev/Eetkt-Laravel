<?php

namespace App\Http\Controllers\Api;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityCategoryResource;
use App\Http\Resources\CityCategoryCollection;

class CityCityCategoriesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\City $city
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, City $city)
    {
        $this->authorize('view', $city);

        $search = $request->get('search', '');

        $cityCategories = $city
            ->cityCategory()
            ->search($search)
            ->latest()
            ->paginate();

        return new CityCategoryCollection($cityCategories);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\City $city
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, City $city)
    {
        $this->authorize('create', CityCategory::class);

        $validated = $request->validate([]);

        $cityCategory = $city->cityCategory()->create($validated);

        return new CityCategoryResource($cityCategory);
    }
}
