<?php

namespace App\Http\Controllers\Api;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Resources\CityResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityCollection;
use App\Http\Requests\CityStoreRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CityUpdateRequest;

class CityController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', City::class);

        $search = $request->get('search', '');

        $cities = City::search($search)
            ->latest()
            ->paginate();

        return new CityCollection($cities);
    }

    /**
     * @param \App\Http\Requests\CityStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityStoreRequest $request)
    {
        $this->authorize('create', City::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $city = City::create($validated);

        return new CityResource($city);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\City $city
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, City $city)
    {
        $this->authorize('view', $city);

        return new CityResource($city);
    }

    /**
     * @param \App\Http\Requests\CityUpdateRequest $request
     * @param \App\Models\City $city
     * @return \Illuminate\Http\Response
     */
    public function update(CityUpdateRequest $request, City $city)
    {
        $this->authorize('update', $city);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($city->image) {
                Storage::delete($city->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $city->update($validated);

        return new CityResource($city);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\City $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, City $city)
    {
        $this->authorize('delete', $city);

        if ($city->image) {
            Storage::delete($city->image);
        }

        $city->delete();

        return response()->noContent();
    }
}
