<?php

namespace App\Http\Controllers\Api;

use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\HotelServiceResource;
use App\Http\Resources\HotelServiceCollection;

class HotelHotelServicesController extends Controller
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

        $hotelServices = $hotel
            ->hotelServices()
            ->search($search)
            ->latest()
            ->paginate();

        return new HotelServiceCollection($hotelServices);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Hotel $hotel
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Hotel $hotel)
    {
        $this->authorize('create', HotelService::class);

        $validated = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'cost' => ['required', 'numeric'],
        ]);

        $hotelService = $hotel->hotelServices()->create($validated);

        return new HotelServiceResource($hotelService);
    }
}
