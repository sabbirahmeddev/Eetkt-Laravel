<?php

namespace App\Http\Controllers\Api;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Resources\CityResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityCollection;

class CountryCitiesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Country $country
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Country $country)
    {
        $this->authorize('view', $country);

        $search = $request->get('search', '');

        $cities = $country
            ->cities()
            ->search($search)
            ->latest()
            ->paginate();

        return new CityCollection($cities);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Country $country
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Country $country)
    {
        $this->authorize('create', City::class);

        $validated = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'image' => ['nullable', 'image', 'max:1024'],
            'description' => ['required', 'max:255', 'string'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $city = $country->cities()->create($validated);

        return new CityResource($city);
    }
}
