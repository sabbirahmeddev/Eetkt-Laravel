<?php

namespace App\Http\Controllers\Api;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BusRouteResource;
use App\Http\Resources\BusRouteCollection;

class CityBusRoutesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\City $city
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, City $city)
    {
        $this->authorize('view', $city);

        $search = $request->get('search', '');

        $busRoutes = $city
            ->busRouteTo()
            ->search($search)
            ->latest()
            ->paginate();

        return new BusRouteCollection($busRoutes);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\City $city
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, City $city)
    {
        $this->authorize('create', BusRoute::class);

        $validated = $request->validate([
            'bus_id' => ['required', 'exists:buses,id'],
            'start_time' => ['required', 'date'],
            'end_time' => ['required', 'date'],
            'seat_cost' => ['required', 'numeric'],
        ]);

        $busRoute = $city->busRouteTo()->create($validated);

        return new BusRouteResource($busRoute);
    }
}
