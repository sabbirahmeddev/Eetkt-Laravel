<?php

namespace App\Http\Controllers\Api;

use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\HotelFacilityResource;
use App\Http\Resources\HotelFacilityCollection;

class HotelHotelFacilitiesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Hotel $hotel
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Hotel $hotel)
    {
        $this->authorize('view', $hotel);

        $search = $request->get('search', '');

        $hotelFacilities = $hotel
            ->hotelFacilities()
            ->search($search)
            ->latest()
            ->paginate();

        return new HotelFacilityCollection($hotelFacilities);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Hotel $hotel
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Hotel $hotel)
    {
        $this->authorize('create', HotelFacility::class);

        $validated = $request->validate([
            'name' => ['required', 'max:255', 'string'],
        ]);

        $hotelFacility = $hotel->hotelFacilities()->create($validated);

        return new HotelFacilityResource($hotelFacility);
    }
}
