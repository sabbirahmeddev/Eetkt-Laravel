<?php

namespace App\Http\Controllers;

use App\Models\Insurance;
use Illuminate\Http\Request;
use App\Models\InsuranceAgency;
use App\Http\Requests\InsuranceStoreRequest;
use App\Http\Requests\InsuranceUpdateRequest;

class InsuranceController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Insurance::class);

        $search = $request->get('search', '');

        $insurances = Insurance::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.insurances.index', compact('insurances', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Insurance::class);

        $insuranceAgencies = InsuranceAgency::pluck('name', 'id');

        return view('app.insurances.create', compact('insuranceAgencies'));
    }

    /**
     * @param \App\Http\Requests\InsuranceStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsuranceStoreRequest $request)
    {
        $this->authorize('create', Insurance::class);

        $validated = $request->validated();

        $insurance = Insurance::create($validated);

        return redirect()
            ->route('insurances.edit', $insurance)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Insurance $insurance
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Insurance $insurance)
    {
        $this->authorize('view', $insurance);

        return view('app.insurances.show', compact('insurance'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Insurance $insurance
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Insurance $insurance)
    {
        $this->authorize('update', $insurance);

        $insuranceAgencies = InsuranceAgency::pluck('name', 'id');

        return view(
            'app.insurances.edit',
            compact('insurance', 'insuranceAgencies')
        );
    }

    /**
     * @param \App\Http\Requests\InsuranceUpdateRequest $request
     * @param \App\Models\Insurance $insurance
     * @return \Illuminate\Http\Response
     */
    public function update(
        InsuranceUpdateRequest $request,
        Insurance $insurance
    ) {
        $this->authorize('update', $insurance);

        $validated = $request->validated();

        $insurance->update($validated);

        return redirect()
            ->route('insurances.edit', $insurance)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Insurance $insurance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Insurance $insurance)
    {
        $this->authorize('delete', $insurance);

        $insurance->delete();

        return redirect()
            ->route('insurances.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
