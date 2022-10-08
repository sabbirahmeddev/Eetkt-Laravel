<?php

namespace App\Http\Controllers;

use App\Models\CarDriver;
use Illuminate\Http\Request;
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
            ->paginate(5)
            ->withQueryString();

        return view('app.car_drivers.index', compact('carDrivers', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', CarDriver::class);

        return view('app.car_drivers.create');
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

        return redirect()
            ->route('car-drivers.edit', $carDriver)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CarDriver $carDriver
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CarDriver $carDriver)
    {
        $this->authorize('view', $carDriver);

        return view('app.car_drivers.show', compact('carDriver'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CarDriver $carDriver
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, CarDriver $carDriver)
    {
        $this->authorize('update', $carDriver);

        return view('app.car_drivers.edit', compact('carDriver'));
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

        return redirect()
            ->route('car-drivers.edit', $carDriver)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('car-drivers.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
