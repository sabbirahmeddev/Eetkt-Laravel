<?php

namespace App\Http\Controllers\Api;

use App\Models\Bus;
use Illuminate\Http\Request;
use App\Http\Resources\BusResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\BusCollection;
use App\Http\Requests\BusStoreRequest;
use App\Http\Requests\BusUpdateRequest;

class BusController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Bus::class);

        $search = $request->get('search', '');

        $buses = Bus::search($search)
            ->latest()
            ->paginate();

        return new BusCollection($buses);
    }

    /**
     * @param \App\Http\Requests\BusStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BusStoreRequest $request)
    {
        $this->authorize('create', Bus::class);

        $validated = $request->validated();

        $bus = Bus::create($validated);

        return new BusResource($bus);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Bus $bus
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Bus $bus)
    {
        $this->authorize('view', $bus);

        return new BusResource($bus);
    }

    /**
     * @param \App\Http\Requests\BusUpdateRequest $request
     * @param \App\Models\Bus $bus
     * @return \Illuminate\Http\Response
     */
    public function update(BusUpdateRequest $request, Bus $bus)
    {
        $this->authorize('update', $bus);

        $validated = $request->validated();

        $bus->update($validated);

        return new BusResource($bus);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Bus $bus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Bus $bus)
    {
        $this->authorize('delete', $bus);

        $bus->delete();

        return response()->noContent();
    }
}
