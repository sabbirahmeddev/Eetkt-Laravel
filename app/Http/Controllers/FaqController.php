<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Requests\FaqStoreRequest;
use App\Http\Requests\FaqUpdateRequest;

class FaqController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Faq::class);

        $search = $request->get('search', '');

        $faqs = Faq::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.faqs.index', compact('faqs', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Faq::class);

        return view('app.faqs.create');
    }

    /**
     * @param \App\Http\Requests\FaqStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaqStoreRequest $request)
    {
        $this->authorize('create', Faq::class);

        $validated = $request->validated();

        $faq = Faq::create($validated);

        return redirect()
            ->route('faqs.edit', $faq)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Faq $faq)
    {
        $this->authorize('view', $faq);

        return view('app.faqs.show', compact('faq'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Faq $faq)
    {
        $this->authorize('update', $faq);

        return view('app.faqs.edit', compact('faq'));
    }

    /**
     * @param \App\Http\Requests\FaqUpdateRequest $request
     * @param \App\Models\Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function update(FaqUpdateRequest $request, Faq $faq)
    {
        $this->authorize('update', $faq);

        $validated = $request->validated();

        $faq->update($validated);

        return redirect()
            ->route('faqs.edit', $faq)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Faq $faq)
    {
        $this->authorize('delete', $faq);

        $faq->delete();

        return redirect()
            ->route('faqs.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
