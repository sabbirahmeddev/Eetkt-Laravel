<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\InsuranceAgency;
use App\Http\Controllers\Controller;
use App\Http\Resources\InsuranceResource;
use App\Http\Resources\InsuranceCollection;

class InsuranceAgencyInsurancesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\InsuranceAgency $insuranceAgency
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, InsuranceAgency $insuranceAgency)
    {
        $this->authorize('view', $insuranceAgency);

        $search = $request->get('search', '');

        $insurances = $insuranceAgency
            ->insurances()
            ->search($search)
            ->latest()
            ->paginate();

        return new InsuranceCollection($insurances);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\InsuranceAgency $insuranceAgency
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, InsuranceAgency $insuranceAgency)
    {
        $this->authorize('create', Insurance::class);

        $validated = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'description' => ['required', 'max:255', 'string'],
        ]);

        $insurance = $insuranceAgency->insurances()->create($validated);

        return new InsuranceResource($insurance);
    }
}
