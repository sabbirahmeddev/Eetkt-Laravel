<?php

namespace App\Http\Controllers\Api;

use App\Models\HotelType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\HotelResource;
use App\Http\Resources\HotelCollection;

class HotelTypeHotelsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\HotelType $hotelType
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, HotelType $hotelType)
    {
        $this->authorize('view', $hotelType);

        $search = $request->get('search', '');

        $hotels = $hotelType
            ->hotels()
            ->search($search)
            ->latest()
            ->paginate();

        return new HotelCollection($hotels);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\HotelType $hotelType
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, HotelType $hotelType)
    {
        $this->authorize('create', Hotel::class);

        $validated = $request->validate([
            'Name' => ['nullable', 'max:255', 'string'],
        ]);

        $hotel = $hotelType->hotels()->create($validated);

        return new HotelResource($hotel);
    }
}
