<?php

namespace App\Http\Controllers\Api;

use App\Models\CarBrand;
use Illuminate\Http\Request;
use App\Http\Resources\CarResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\CarCollection;

class CarBrandCarsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CarBrand $carBrand
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, CarBrand $carBrand)
    {
        $this->authorize('view', $carBrand);

        $search = $request->get('search', '');

        $cars = $carBrand
            ->cars()
            ->search($search)
            ->latest()
            ->paginate();

        return new CarCollection($cars);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CarBrand $carBrand
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CarBrand $carBrand)
    {
        $this->authorize('create', Car::class);

        $validated = $request->validate([
            'number' => ['required', 'numeric'],
            'image' => ['nullable', 'image', 'max:1024'],
            'video' => ['required', 'max:255', 'string'],
            'car_driver_id' => ['required', 'exists:car_drivers,id'],
            'seat_count' => ['required', 'numeric'],
            'cost' => ['required', 'numeric'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $car = $carBrand->cars()->create($validated);

        return new CarResource($car);
    }
}
