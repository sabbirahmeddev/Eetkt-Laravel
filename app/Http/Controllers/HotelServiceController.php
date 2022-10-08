<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\HotelService;
use Illuminate\Http\Request;
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
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.hotel_services.index',
            compact('hotelServices', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', HotelService::class);

        $hotels = Hotel::pluck('Name', 'id');

        return view('app.hotel_services.create', compact('hotels'));
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

        return redirect()
            ->route('hotel-services.edit', $hotelService)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\HotelService $hotelService
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, HotelService $hotelService)
    {
        $this->authorize('view', $hotelService);

        return view('app.hotel_services.show', compact('hotelService'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\HotelService $hotelService
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, HotelService $hotelService)
    {
        $this->authorize('update', $hotelService);

        $hotels = Hotel::pluck('Name', 'id');

        return view(
            'app.hotel_services.edit',
            compact('hotelService', 'hotels')
        );
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

        return redirect()
            ->route('hotel-services.edit', $hotelService)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('hotel-services.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
