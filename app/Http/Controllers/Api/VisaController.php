<?php

namespace App\Http\Controllers\Api;

use App\Models\Visa;
use Illuminate\Http\Request;
use App\Http\Resources\VisaResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\VisaCollection;
use App\Http\Requests\VisaStoreRequest;
use App\Http\Requests\VisaUpdateRequest;

class VisaController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Visa::class);

        $search = $request->get('search', '');

        $visas = Visa::search($search)
            ->latest()
            ->paginate();

        return new VisaCollection($visas);
    }

    /**
     * @param \App\Http\Requests\VisaStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(VisaStoreRequest $request)
    {
        $this->authorize('create', Visa::class);

        $validated = $request->validated();

        $visa = Visa::create($validated);

        return new VisaResource($visa);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Visa $visa
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Visa $visa)
    {
        $this->authorize('view', $visa);

        return new VisaResource($visa);
    }

    /**
     * @param \App\Http\Requests\VisaUpdateRequest $request
     * @param \App\Models\Visa $visa
     * @return \Illuminate\Http\Response
     */
    public function update(VisaUpdateRequest $request, Visa $visa)
    {
        $this->authorize('update', $visa);

        $validated = $request->validated();

        $visa->update($validated);

        return new VisaResource($visa);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Visa $visa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Visa $visa)
    {
        $this->authorize('delete', $visa);

        $visa->delete();

        return response()->noContent();
    }
}
