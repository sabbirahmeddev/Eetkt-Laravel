<?php

namespace App\Http\Controllers\Api;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Resources\VisaResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\VisaCollection;

class CountryVisasController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Country $country
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Country $country)
    {
        $this->authorize('view', $country);

        $search = $request->get('search', '');

        $visas = $country
            ->visas()
            ->search($search)
            ->latest()
            ->paginate();

        return new VisaCollection($visas);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Country $country
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Country $country)
    {
        $this->authorize('create', Visa::class);

        $validated = $request->validate([]);

        $visa = $country->visas()->create($validated);

        return new VisaResource($visa);
    }
}
