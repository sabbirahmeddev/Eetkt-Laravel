<?php

namespace App\Http\Controllers\Api;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\HolidayResource;
use App\Http\Resources\HolidayCollection;

class CityHolidaysController extends Controller
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

        $holidays = $city
            ->holidays()
            ->search($search)
            ->latest()
            ->paginate();

        return new HolidayCollection($holidays);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\City $city
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, City $city)
    {
        $this->authorize('create', Holiday::class);

        $validated = $request->validate([
            'title' => ['required', 'max:255', 'string'],
            'image' => ['nullable', 'image', 'max:1024'],
            'description' => ['required', 'max:255', 'string'],
            'cost' => ['required', 'numeric'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $holiday = $city->holidays()->create($validated);

        return new HolidayResource($holiday);
    }
}
