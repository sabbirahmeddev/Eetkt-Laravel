<?php

namespace App\Http\Controllers\Api;

use App\Models\Holiday;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\HolidayResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\HolidayCollection;
use App\Http\Requests\HolidayStoreRequest;
use App\Http\Requests\HolidayUpdateRequest;

class HolidayController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Holiday::class);

        $search = $request->get('search', '');

        $holidays = Holiday::search($search)
            ->latest()
            ->paginate();

        return new HolidayCollection($holidays);
    }

    /**
     * @param \App\Http\Requests\HolidayStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(HolidayStoreRequest $request)
    {
        $this->authorize('create', Holiday::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $holiday = Holiday::create($validated);

        return new HolidayResource($holiday);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Holiday $holiday
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Holiday $holiday)
    {
        $this->authorize('view', $holiday);

        return new HolidayResource($holiday);
    }

    /**
     * @param \App\Http\Requests\HolidayUpdateRequest $request
     * @param \App\Models\Holiday $holiday
     * @return \Illuminate\Http\Response
     */
    public function update(HolidayUpdateRequest $request, Holiday $holiday)
    {
        $this->authorize('update', $holiday);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($holiday->image) {
                Storage::delete($holiday->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $holiday->update($validated);

        return new HolidayResource($holiday);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Holiday $holiday
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Holiday $holiday)
    {
        $this->authorize('delete', $holiday);

        if ($holiday->image) {
            Storage::delete($holiday->image);
        }

        $holiday->delete();

        return response()->noContent();
    }
}
