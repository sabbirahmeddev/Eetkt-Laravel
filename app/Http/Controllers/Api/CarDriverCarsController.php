<?php

namespace App\Http\Controllers\Api;

use App\Models\CarDriver;
use Illuminate\Http\Request;
use App\Http\Resources\CarResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\CarCollection;

class CarDriverCarsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CarDriver $carDriver
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, CarDriver $carDriver)
    {
        $this->authorize('view', $carDriver);

        $search = $request->get('search', '');

        $cars = $carDriver
            ->cars()
            ->search($search)
            ->latest()
            ->paginate();

        return new CarCollection($cars);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CarDriver $carDriver
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CarDriver $carDriver)
    {
        $this->authorize('create', Car::class);

        $validated = $request->validate([
            'car_brand_id' => ['required', 'exists:car_brands,id'],
            'number' => ['required', 'numeric'],
            'image' => ['nullable', 'image', 'max:1024'],
            'video' => ['required', 'max:255', 'string'],
            'seat_count' => ['required', 'numeric'],
            'cost' => ['required', 'numeric'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $car = $carDriver->cars()->create($validated);

        return new CarResource($car);
    }
}
