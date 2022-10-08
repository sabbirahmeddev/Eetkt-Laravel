<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\HotelType;
use Illuminate\Http\Request;
use App\Http\Requests\HotelStoreRequest;
use App\Http\Requests\HotelUpdateRequest;

class HotelController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Hotel::class);

        $search = $request->get('search', '');

        $hotels = Hotel::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.hotels.index', compact('hotels', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Hotel::class);

        $hotelTypes = HotelType::pluck('name', 'id');

        return view('app.hotels.create', compact('hotelTypes'));
    }

    /**
     * @param \App\Http\Requests\HotelStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(HotelStoreRequest $request)
    {
        $this->authorize('create', Hotel::class);

        $validated = $request->validated();

        $hotel = Hotel::create($validated);

        return redirect()
            ->route('hotels.edit', $hotel)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Hotel $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Hotel $hotel)
    {
        $this->authorize('view', $hotel);

        return view('app.hotels.show', compact('hotel'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Hotel $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Hotel $hotel)
    {
        $this->authorize('update', $hotel);

        $hotelTypes = HotelType::pluck('name', 'id');

        return view('app.hotels.edit', compact('hotel', 'hotelTypes'));
    }

    /**
     * @param \App\Http\Requests\HotelUpdateRequest $request
     * @param \App\Models\Hotel $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(HotelUpdateRequest $request, Hotel $hotel)
    {
        $this->authorize('update', $hotel);

        $validated = $request->validated();

        $hotel->update($validated);

        return redirect()
            ->route('hotels.edit', $hotel)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Hotel $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Hotel $hotel)
    {
        $this->authorize('delete', $hotel);

        $hotel->delete();

        return redirect()
            ->route('hotels.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
