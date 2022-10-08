<?php

namespace App\Http\Controllers\Api;

use App\Models\Bus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BusRouteResource;
use App\Http\Resources\BusRouteCollection;

class BusBusRoutesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Bus $bus
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Bus $bus)
    {
        $this->authorize('view', $bus);

        $search = $request->get('search', '');

        $busRoutes = $bus
            ->busRoutes()
            ->search($search)
            ->latest()
            ->paginate();

        return new BusRouteCollection($busRoutes);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Bus $bus
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Bus $bus)
    {
        $this->authorize('create', BusRoute::class);

        $validated = $request->validate([
            'from' => ['required', 'exists:cities,id'],
            'to' => ['required', 'exists:cities,id'],
            'start_time' => ['required', 'date'],
            'end_time' => ['required', 'date'],
            'seat_cost' => ['required', 'numeric'],
        ]);

        $busRoute = $bus->busRoutes()->create($validated);

        return new BusRouteResource($busRoute);
    }
}
