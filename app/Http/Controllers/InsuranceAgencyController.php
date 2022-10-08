<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InsuranceAgency;
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
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.insurance_agencies.index',
            compact('insuranceAgencies', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', InsuranceAgency::class);

        return view('app.insurance_agencies.create');
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

        return redirect()
            ->route('insurance-agencies.edit', $insuranceAgency)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\InsuranceAgency $insuranceAgency
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, InsuranceAgency $insuranceAgency)
    {
        $this->authorize('view', $insuranceAgency);

        return view('app.insurance_agencies.show', compact('insuranceAgency'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\InsuranceAgency $insuranceAgency
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, InsuranceAgency $insuranceAgency)
    {
        $this->authorize('update', $insuranceAgency);

        return view('app.insurance_agencies.edit', compact('insuranceAgency'));
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

        return redirect()
            ->route('insurance-agencies.edit', $insuranceAgency)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('insurance-agencies.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
