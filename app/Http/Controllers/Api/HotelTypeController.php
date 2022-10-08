<?php

namespace App\Http\Controllers\Api;

use App\Models\HotelType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\HotelTypeResource;
use App\Http\Resources\HotelTypeCollection;
use App\Http\Requests\HotelTypeStoreRequest;
use App\Http\Requests\HotelTypeUpdateRequest;

class HotelTypeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', HotelType::class);

        $search = $request->get('search', '');

        $hotelTypes = HotelType::search($search)
            ->latest()
            ->paginate();

        return new HotelTypeCollection($hotelTypes);
    }

    /**
     * @param \App\Http\Requests\HotelTypeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(HotelTypeStoreRequest $request)
    {
        $this->authorize('create', HotelType::class);

        $validated = $request->validated();

        $hotelType = HotelType::create($validated);

        return new HotelTypeResource($hotelType);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\HotelType $hotelType
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, HotelType $hotelType)
    {
        $this->authorize('view', $hotelType);

        return new HotelTypeResource($hotelType);
    }

    /**
     * @param \App\Http\Requests\HotelTypeUpdateRequest $request
     * @param \App\Models\HotelType $hotelType
     * @return \Illuminate\Http\Response
     */
    public function update(
        HotelTypeUpdateRequest $request,
        HotelType $hotelType
    ) {
        $this->authorize('update', $hotelType);

        $validated = $request->validated();

        $hotelType->update($validated);

        return new HotelTypeResource($hotelType);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\HotelType $hotelType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, HotelType $hotelType)
    {
        $this->authorize('delete', $hotelType);

        $hotelType->delete();

        return response()->noContent();
    }
}
