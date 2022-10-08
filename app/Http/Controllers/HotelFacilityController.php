<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Models\HotelFacility;
use App\Http\Requests\HotelFacilityStoreRequest;
use App\Http\Requests\HotelFacilityUpdateRequest;

class HotelFacilityController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', HotelFacility::class);

        $search = $request->get('search', '');

        $hotelFacilities = HotelFacility::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.hotel_facilities.index',
            compact('hotelFacilities', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', HotelFacility::class);

        $hotels = Hotel::pluck('Name', 'id');

        return view('app.hotel_facilities.create', compact('hotels'));
    }

    /**
     * @param \App\Http\Requests\HotelFacilityStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(HotelFacilityStoreRequest $request)
    {
        $this->authorize('create', HotelFacility::class);

        $validated = $request->validated();

        $hotelFacility = HotelFacility::create($validated);

        return redirect()
            ->route('hotel-facilities.edit', $hotelFacility)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\HotelFacility $hotelFacility
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, HotelFacility $hotelFacility)
    {
        $this->authorize('view', $hotelFacility);

        return view('app.hotel_facilities.show', compact('hotelFacility'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\HotelFacility $hotelFacility
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, HotelFacility $hotelFacility)
    {
        $this->authorize('update', $hotelFacility);

        $hotels = Hotel::pluck('Name', 'id');

        return view(
            'app.hotel_facilities.edit',
            compact('hotelFacility', 'hotels')
        );
    }

    /**
     * @param \App\Http\Requests\HotelFacilityUpdateRequest $request
     * @param \App\Models\HotelFacility $hotelFacility
     * @return \Illuminate\Http\Response
     */
    public function update(
        HotelFacilityUpdateRequest $request,
        HotelFacility $hotelFacility
    ) {
        $this->authorize('update', $hotelFacility);

        $validated = $request->validated();

        $hotelFacility->update($validated);

        return redirect()
            ->route('hotel-facilities.edit', $hotelFacility)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\HotelFacility $hotelFacility
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, HotelFacility $hotelFacility)
    {
        $this->authorize('delete', $hotelFacility);

        $hotelFacility->delete();

        return redirect()
            ->route('hotel-facilities.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
