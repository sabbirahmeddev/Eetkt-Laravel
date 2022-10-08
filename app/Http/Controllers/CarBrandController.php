<?php

namespace App\Http\Controllers;

use App\Models\CarBrand;
use Illuminate\Http\Request;
use App\Http\Requests\CarBrandStoreRequest;
use App\Http\Requests\CarBrandUpdateRequest;

class CarBrandController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', CarBrand::class);

        $search = $request->get('search', '');

        $carBrands = CarBrand::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.car_brands.index', compact('carBrands', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', CarBrand::class);

        return view('app.car_brands.create');
    }

    /**
     * @param \App\Http\Requests\CarBrandStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarBrandStoreRequest $request)
    {
        $this->authorize('create', CarBrand::class);

        $validated = $request->validated();

        $carBrand = CarBrand::create($validated);

        return redirect()
            ->route('car-brands.edit', $carBrand)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CarBrand $carBrand
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CarBrand $carBrand)
    {
        $this->authorize('view', $carBrand);

        return view('app.car_brands.show', compact('carBrand'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CarBrand $carBrand
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, CarBrand $carBrand)
    {
        $this->authorize('update', $carBrand);

        return view('app.car_brands.edit', compact('carBrand'));
    }

    /**
     * @param \App\Http\Requests\CarBrandUpdateRequest $request
     * @param \App\Models\CarBrand $carBrand
     * @return \Illuminate\Http\Response
     */
    public function update(CarBrandUpdateRequest $request, CarBrand $carBrand)
    {
        $this->authorize('update', $carBrand);

        $validated = $request->validated();

        $carBrand->update($validated);

        return redirect()
            ->route('car-brands.edit', $carBrand)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CarBrand $carBrand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, CarBrand $carBrand)
    {
        $this->authorize('delete', $carBrand);

        $carBrand->delete();

        return redirect()
            ->route('car-brands.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
