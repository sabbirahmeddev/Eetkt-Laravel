<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Holiday;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            ->paginate(5)
            ->withQueryString();

        return view('app.holidays.index', compact('holidays', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Holiday::class);

        $cities = City::pluck('name', 'id');

        return view('app.holidays.create', compact('cities'));
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

        return redirect()
            ->route('holidays.edit', $holiday)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Holiday $holiday
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Holiday $holiday)
    {
        $this->authorize('view', $holiday);

        return view('app.holidays.show', compact('holiday'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Holiday $holiday
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Holiday $holiday)
    {
        $this->authorize('update', $holiday);

        $cities = City::pluck('name', 'id');

        return view('app.holidays.edit', compact('holiday', 'cities'));
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

        return redirect()
            ->route('holidays.edit', $holiday)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('holidays.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
