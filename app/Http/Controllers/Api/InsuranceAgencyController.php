<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\InsuranceAgency;
use App\Http\Controllers\Controller;
use App\Http\Resources\InsuranceAgencyResource;
use App\Http\Resources\InsuranceAgencyCollection;
use App\Http\Requests\InsuranceAgencyStoreRequest;
use App\Http\Requests\InsuranceAgencyUpdateRequest;

class InsuranceAgencyController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', InsuranceAgency::class);

        $search = $request->get('search', '');

        $insuranceAgencies = InsuranceAgency::search($search)
            ->latest()
            ->paginate();

        return new InsuranceAgencyCollection($insuranceAgencies);
    }

    /**
     * @param \App\Http\Requests\InsuranceAgencyStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsuranceAgencyStoreRequest $request)
    {
        $this->authorize('create', InsuranceAgency::class);

        $validated = $request->validated();

        $insuranceAgency = InsuranceAgency::create($validated);

        return new InsuranceAgencyResource($insuranceAgency);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\InsuranceAgency $insuranceAgency
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, InsuranceAgency $insuranceAgency)
    {
        $this->authorize('view', $insuranceAgency);

        return new InsuranceAgencyResource($insuranceAgency);
    }

    /**
     * @param \App\Http\Requests\InsuranceAgencyUpdateRequest $request
     * @param \App\Models\InsuranceAgency $insuranceAgency
     * @return \Illuminate\Http\Response
     */
    public function update(
        InsuranceAgencyUpdateRequest $request,
        InsuranceAgency $insuranceAgency
    ) {
        $this->authorize('update', $insuranceAgency);

        $validated = $request->validated();

        $insuranceAgency->update($validated);

        return new InsuranceAgencyResource($insuranceAgency);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\InsuranceAgency $insuranceAgency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, InsuranceAgency $insuranceAgency)
    {
        $this->authorize('delete', $insuranceAgency);

        $insuranceAgency->delete();

        return response()->noContent();
    }
}
