<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
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
            ->paginate(5)
            ->withQueryString();

        return view('app.cities.index', compact('cities', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', City::class);

        $countries = Country::pluck('name', 'id');

        return view('app.cities.create', compact('countries'));
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

        return redirect()
            ->route('cities.edit', $city)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\City $city
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, City $city)
    {
        $this->authorize('view', $city);

        return view('app.cities.show', compact('city'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\City $city
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, City $city)
    {
        $this->authorize('update', $city);

        $countries = Country::pluck('name', 'id');

        return view('app.cities.edit', compact('city', 'countries'));
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

        return redirect()
            ->route('cities.edit', $city)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('cities.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
