<?php

namespace App\Http\Controllers\Api;

use App\Models\Insurance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\InsuranceResource;
use App\Http\Resources\InsuranceCollection;
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
            ->paginate();

        return new InsuranceCollection($insurances);
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

        return new InsuranceResource($insurance);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Insurance $insurance
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Insurance $insurance)
    {
        $this->authorize('view', $insurance);

        return new InsuranceResource($insurance);
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

        return new InsuranceResource($insurance);
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

        return response()->noContent();
    }
}
