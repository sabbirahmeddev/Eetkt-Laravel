<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\EventType;
use App\Models\CityEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CityEventStoreRequest;
use App\Http\Requests\CityEventUpdateRequest;

class CityEventController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', CityEvent::class);

        $search = $request->get('search', '');

        $cityEvents = CityEvent::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.all_city_events.index',
            compact('cityEvents', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', CityEvent::class);

        $eventTypes = EventType::pluck('name', 'id');
        $cities = City::pluck('name', 'id');

        return view(
            'app.all_city_events.create',
            compact('eventTypes', 'cities')
        );
    }

    /**
     * @param \App\Http\Requests\CityEventStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityEventStoreRequest $request)
    {
        $this->authorize('create', CityEvent::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $cityEvent = CityEvent::create($validated);

        return redirect()
            ->route('city-events.edit', $cityEvent)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CityEvent $cityEvent
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CityEvent $cityEvent)
    {
        $this->authorize('view', $cityEvent);

        return view('app.all_city_events.show', compact('cityEvent'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CityEvent $cityEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, CityEvent $cityEvent)
    {


        $this->authorize('update', $cityEvent);

        $eventTypes = EventType::pluck('name', 'id');
        $cities = City::pluck('name', 'id');

        return view(
            'app.all_city_events.edit',
            compact('cityEvent', 'eventTypes', 'cities')
        );
    }

    /**
     * @param \App\Http\Requests\CityEventUpdateRequest $request
     * @param \App\Models\CityEvent $cityEvent
     * @return \Illuminate\Http\Response
     */
    public function update(
        CityEventUpdateRequest $request,
        CityEvent $cityEvent
    ) {
        $this->authorize('update', $cityEvent);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($cityEvent->image) {
                Storage::delete($cityEvent->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $cityEvent->update($validated);

        return redirect()
            ->route('city-events.edit', $cityEvent)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CityEvent $cityEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, CityEvent $cityEvent)
    {
        $this->authorize('delete', $cityEvent);

        if ($cityEvent->image) {
            Storage::delete($cityEvent->image);
        }

        $cityEvent->delete();

        return redirect()
            ->route('city-events.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
