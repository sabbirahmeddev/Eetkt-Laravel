<?php

namespace App\Http\Controllers;

use App\Models\HotelType;
use Illuminate\Http\Request;
use App\Http\Requests\HotelTypeStoreRequest;
use App\Http\Requests\HotelTypeUpdateRequest;

class HotelTypeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', HotelType::class);

        $search = $request->get('search', '');

        $hotelTypes = HotelType::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.hotel_types.index', compact('hotelTypes', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', HotelType::class);

        return view('app.hotel_types.create');
    }

    /**
     * @param \App\Http\Requests\HotelTypeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(HotelTypeStoreRequest $request)
    {
        $this->authorize('create', HotelType::class);

        $validated = $request->validated();

        $hotelType = HotelType::create($validated);

        return redirect()
            ->route('hotel-types.edit', $hotelType)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\HotelType $hotelType
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, HotelType $hotelType)
    {
        $this->authorize('view', $hotelType);

        return view('app.hotel_types.show', compact('hotelType'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\HotelType $hotelType
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, HotelType $hotelType)
    {
        $this->authorize('update', $hotelType);

        return view('app.hotel_types.edit', compact('hotelType'));
    }

    /**
     * @param \App\Http\Requests\HotelTypeUpdateRequest $request
     * @param \App\Models\HotelType $hotelType
     * @return \Illuminate\Http\Response
     */
    public function update(
        HotelTypeUpdateRequest $request,
        HotelType $hotelType
    ) {
        $this->authorize('update', $hotelType);

        $validated = $request->validated();

        $hotelType->update($validated);

        return redirect()
            ->route('hotel-types.edit', $hotelType)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\HotelType $hotelType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, HotelType $hotelType)
    {
        $this->authorize('delete', $hotelType);

        $hotelType->delete();

        return redirect()
            ->route('hotel-types.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
