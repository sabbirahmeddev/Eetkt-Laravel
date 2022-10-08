<?php

namespace App\Http\Controllers\Api;

use App\Models\EventType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityEventsResource;
use App\Http\Resources\CityEventsCollection;

class EventTypeAllCityEventsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EventType $eventType
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, EventType $eventType)
    {
        $this->authorize('view', $eventType);

        $search = $request->get('search', '');

        $allCityEvents = $eventType
            ->allCityEvents()
            ->search($search)
            ->latest()
            ->paginate();

        return new CityEventsCollection($allCityEvents);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\EventType $eventType
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, EventType $eventType)
    {
        $this->authorize('create', CityEvents::class);

        $validated = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'image' => ['nullable', 'image', 'max:1024'],
            'description' => ['required', 'max:255', 'string'],
            'city_id' => ['required', 'exists:cities,id'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $cityEvents = $eventType->allCityEvents()->create($validated);

        return new CityEventsResource($cityEvents);
    }
}
