<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\HotelFacility;
use App\Http\Controllers\Controller;
use App\Http\Resources\HotelFacilityResource;
use App\Http\Resources\HotelFacilityCollection;
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
            ->paginate();

        return new HotelFacilityCollection($hotelFacilities);
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

        return new HotelFacilityResource($hotelFacility);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\HotelFacility $hotelFacility
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, HotelFacility $hotelFacility)
    {
        $this->authorize('view', $hotelFacility);

        return new HotelFacilityResource($hotelFacility);
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

        return new HotelFacilityResource($hotelFacility);
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

        return response()->noContent();
    }
}
