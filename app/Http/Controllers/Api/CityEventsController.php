<?php

namespace App\Http\Controllers\Api;

use App\Models\CityEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\CityEventResource;
use App\Http\Resources\CityEventCollection;
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

        $allCityEvent = CityEvent::search($search)
            ->latest()
            ->paginate();

        return new CityEventCollection($allCityEvent);
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

        return new CityEventResource($cityEvent);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CityEvent $cityEvent
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CityEvent $cityEvent)
    {
        $this->authorize('view', $cityEvent);

        return new CityEventResource($cityEvent);
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

        return new CityEventResource($cityEvent);
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

        return response()->noContent();
    }
}
