<?php

namespace App\Http\Controllers\Api;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Resources\CarResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\CarCollection;
use App\Http\Requests\CarStoreRequest;
use App\Http\Requests\CarUpdateRequest;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Car::class);

        $search = $request->get('search', '');

        $cars = Car::search($search)
            ->latest()
            ->paginate();

        return new CarCollection($cars);
    }

    /**
     * @param \App\Http\Requests\CarStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarStoreRequest $request)
    {
        $this->authorize('create', Car::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $car = Car::create($validated);

        return new CarResource($car);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Car $car
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Car $car)
    {
        $this->authorize('view', $car);

        return new CarResource($car);
    }

    /**
     * @param \App\Http\Requests\CarUpdateRequest $request
     * @param \App\Models\Car $car
     * @return \Illuminate\Http\Response
     */
    public function update(CarUpdateRequest $request, Car $car)
    {
        $this->authorize('update', $car);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($car->image) {
                Storage::delete($car->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $car->update($validated);

        return new CarResource($car);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Car $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Car $car)
    {
        $this->authorize('delete', $car);

        if ($car->image) {
            Storage::delete($car->image);
        }

        $car->delete();

        return response()->noContent();
    }
}
