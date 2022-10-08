<?php

namespace App\Http\Controllers\Api;

use App\Models\BusRoute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BusRouteResource;
use App\Http\Resources\BusRouteCollection;
use App\Http\Requests\BusRouteStoreRequest;
use App\Http\Requests\BusRouteUpdateRequest;

class BusRouteController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', BusRoute::class);

        $search = $request->get('search', '');

        $busRoutes = BusRoute::search($search)
            ->latest()
            ->paginate();

        return new BusRouteCollection($busRoutes);
    }

    /**
     * @param \App\Http\Requests\BusRouteStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BusRouteStoreRequest $request)
    {
        $this->authorize('create', BusRoute::class);

        $validated = $request->validated();

        $busRoute = BusRoute::create($validated);

        return new BusRouteResource($busRoute);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BusRoute $busRoute
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, BusRoute $busRoute)
    {
        $this->authorize('view', $busRoute);

        return new BusRouteResource($busRoute);
    }

    /**
     * @param \App\Http\Requests\BusRouteUpdateRequest $request
     * @param \App\Models\BusRoute $busRoute
     * @return \Illuminate\Http\Response
     */
    public function update(BusRouteUpdateRequest $request, BusRoute $busRoute)
    {
        $this->authorize('update', $busRoute);

        $validated = $request->validated();

        $busRoute->update($validated);

        return new BusRouteResource($busRoute);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BusRoute $busRoute
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, BusRoute $busRoute)
    {
        $this->authorize('delete', $busRoute);

        $busRoute->delete();

        return response()->noContent();
    }
}
