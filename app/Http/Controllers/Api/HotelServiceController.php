<?php

namespace App\Http\Controllers\Api;

use App\Models\HotelService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\HotelServiceResource;
use App\Http\Resources\HotelServiceCollection;
use App\Http\Requests\HotelServiceStoreRequest;
use App\Http\Requests\HotelServiceUpdateRequest;

class HotelServiceController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', HotelService::class);

        $search = $request->get('search', '');

        $hotelServices = HotelService::search($search)
            ->latest()
            ->paginate();

        return new HotelServiceCollection($hotelServices);
    }

    /**
     * @param \App\Http\Requests\HotelServiceStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(HotelServiceStoreRequest $request)
    {
        $this->authorize('create', HotelService::class);

        $validated = $request->validated();

        $hotelService = HotelService::create($validated);

        return new HotelServiceResource($hotelService);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\HotelService $hotelService
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, HotelService $hotelService)
    {
        $this->authorize('view', $hotelService);

        return new HotelServiceResource($hotelService);
    }

    /**
     * @param \App\Http\Requests\HotelServiceUpdateRequest $request
     * @param \App\Models\HotelService $hotelService
     * @return \Illuminate\Http\Response
     */
    public function update(
        HotelServiceUpdateRequest $request,
        HotelService $hotelService
    ) {
        $this->authorize('update', $hotelService);

        $validated = $request->validated();

        $hotelService->update($validated);

        return new HotelServiceResource($hotelService);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\HotelService $hotelService
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, HotelService $hotelService)
    {
        $this->authorize('delete', $hotelService);

        $hotelService->delete();

        return response()->noContent();
    }
}
