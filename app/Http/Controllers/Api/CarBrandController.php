<?php

namespace App\Http\Controllers\Api;

use App\Models\CarBrand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CarBrandResource;
use App\Http\Resources\CarBrandCollection;
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
            ->paginate();

        return new CarBrandCollection($carBrands);
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

        return new CarBrandResource($carBrand);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CarBrand $carBrand
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CarBrand $carBrand)
    {
        $this->authorize('view', $carBrand);

        return new CarBrandResource($carBrand);
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

        return new CarBrandResource($carBrand);
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

        return response()->noContent();
    }
}
