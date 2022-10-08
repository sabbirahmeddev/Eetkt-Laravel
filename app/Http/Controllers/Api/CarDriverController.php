<?php

namespace App\Http\Controllers\Api;

use App\Models\CarDriver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CarDriverResource;
use App\Http\Resources\CarDriverCollection;
use App\Http\Requests\CarDriverStoreRequest;
use App\Http\Requests\CarDriverUpdateRequest;

class CarDriverController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', CarDriver::class);

        $search = $request->get('search', '');

        $carDrivers = CarDriver::search($search)
            ->latest()
            ->paginate();

        return new CarDriverCollection($carDrivers);
    }

    /**
     * @param \App\Http\Requests\CarDriverStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarDriverStoreRequest $request)
    {
        $this->authorize('create', CarDriver::class);

        $validated = $request->validated();

        $carDriver = CarDriver::create($validated);

        return new CarDriverResource($carDriver);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CarDriver $carDriver
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CarDriver $carDriver)
    {
        $this->authorize('view', $carDriver);

        return new CarDriverResource($carDriver);
    }

    /**
     * @param \App\Http\Requests\CarDriverUpdateRequest $request
     * @param \App\Models\CarDriver $carDriver
     * @return \Illuminate\Http\Response
     */
    public function update(
        CarDriverUpdateRequest $request,
        CarDriver $carDriver
    ) {
        $this->authorize('update', $carDriver);

        $validated = $request->validated();

        $carDriver->update($validated);

        return new CarDriverResource($carDriver);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CarDriver $carDriver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, CarDriver $carDriver)
    {
        $this->authorize('delete', $carDriver);

        $carDriver->delete();

        return response()->noContent();
    }
}
