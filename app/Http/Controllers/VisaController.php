<?php

namespace App\Http\Controllers;

use App\Models\Visa;
use App\Models\Country;
use Illuminate\Http\Request;
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
            ->paginate(5)
            ->withQueryString();

        return view('app.visas.index', compact('visas', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Visa::class);

        $countries = Country::pluck('name', 'id');

        return view('app.visas.create', compact('countries'));
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

        return redirect()
            ->route('visas.edit', $visa)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Visa $visa
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Visa $visa)
    {
        $this->authorize('view', $visa);

        return view('app.visas.show', compact('visa'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Visa $visa
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Visa $visa)
    {
        $this->authorize('update', $visa);

        $countries = Country::pluck('name', 'id');

        return view('app.visas.edit', compact('visa', 'countries'));
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

        return redirect()
            ->route('visas.edit', $visa)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('visas.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
