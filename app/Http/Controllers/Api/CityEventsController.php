<?php

namespace App\Http\Controllers\Api;

use App\Models\CityEvents;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\CityEventsResource;
use App\Http\Resources\CityEventsCollection;
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
            ->paginate();

        return new CityEventsCollection($allCityEvents);
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

        return new CityEventsResource($cityEvents);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CityEvents $cityEvents
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CityEvents $cityEvents)
    {
        $this->authorize('view', $cityEvents);

        return new CityEventsResource($cityEvents);
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

        return new CityEventsResource($cityEvents);
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

        return response()->noContent();
    }
}
