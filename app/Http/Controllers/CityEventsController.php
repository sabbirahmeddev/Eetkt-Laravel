<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\EventType;
use App\Models\CityEvents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CityEventsStoreRequest;
use App\Http\Requests\CityEventsUpdateRequest;

class CityEventsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', CityEvents::class);

        $search = $request->get('search', '');

        $allCityEvents = CityEvents::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.all_city_events.index',
            compact('allCityEvents', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', CityEvents::class);

        $eventTypes = EventType::pluck('name', 'id');
        $cities = City::pluck('name', 'id');

        return view(
            'app.all_city_events.create',
            compact('eventTypes', 'cities')
        );
    }

    /**
     * @param \App\Http\Requests\CityEventsStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityEventsStoreRequest $request)
    {
        $this->authorize('create', CityEvents::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $cityEvents = CityEvents::create($validated);

        return redirect()
            ->route('all-city-events.edit', $cityEvents)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CityEvents $cityEvents
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CityEvents $cityEvents)
    {
        $this->authorize('view', $cityEvents);

        return view('app.all_city_events.show', compact('cityEvents'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CityEvents $cityEvents
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, CityEvents $cityEvents)
    {
        $this->authorize('update', $cityEvents);

        $eventTypes = EventType::pluck('name', 'id');
        $cities = City::pluck('name', 'id');

        return view(
            'app.all_city_events.edit',
            compact('cityEvents', 'eventTypes', 'cities')
        );
    }

    /**
     * @param \App\Http\Requests\CityEventsUpdateRequest $request
     * @param \App\Models\CityEvents $cityEvents
     * @return \Illuminate\Http\Response
     */
    public function update(
        CityEventsUpdateRequest $request,
        CityEvents $cityEvents
    ) {
        $this->authorize('update', $cityEvents);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($cityEvents->image) {
                Storage::delete($cityEvents->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $cityEvents->update($validated);

        return redirect()
            ->route('all-city-events.edit', $cityEvents)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CityEvents $cityEvents
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, CityEvents $cityEvents)
    {
        $this->authorize('delete', $cityEvents);

        if ($cityEvents->image) {
            Storage::delete($cityEvents->image);
        }

        $cityEvents->delete();

        return redirect()
            ->route('all-city-events.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
