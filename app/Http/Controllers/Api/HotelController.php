<?php

namespace App\Http\Controllers\Api;

use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\HotelResource;
use App\Http\Resources\HotelCollection;
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
            ->paginate();

        return new HotelCollection($hotels);
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

        return new HotelResource($hotel);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Hotel $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Hotel $hotel)
    {
        $this->authorize('view', $hotel);

        return new HotelResource($hotel);
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

        return new HotelResource($hotel);
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

        return response()->noContent();
    }
}
