<?php

namespace App\Http\Controllers;

use App\Models\SocialLink;
use Illuminate\Http\Request;
use App\Http\Requests\SocialLinkStoreRequest;
use App\Http\Requests\SocialLinkUpdateRequest;

class SocialLinkController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', SocialLink::class);

        $search = $request->get('search', '');

        $socialLinks = SocialLink::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.social_links.index', compact('socialLinks', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', SocialLink::class);

        return view('app.social_links.create');
    }

    /**
     * @param \App\Http\Requests\SocialLinkStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SocialLinkStoreRequest $request)
    {
        $this->authorize('create', SocialLink::class);

        $validated = $request->validated();

        $socialLink = SocialLink::create($validated);

        return redirect()
            ->route('social-links.edit', $socialLink)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SocialLink $socialLink
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, SocialLink $socialLink)
    {
        $this->authorize('view', $socialLink);

        return view('app.social_links.show', compact('socialLink'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SocialLink $socialLink
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, SocialLink $socialLink)
    {
        $this->authorize('update', $socialLink);

        return view('app.social_links.edit', compact('socialLink'));
    }

    /**
     * @param \App\Http\Requests\SocialLinkUpdateRequest $request
     * @param \App\Models\SocialLink $socialLink
     * @return \Illuminate\Http\Response
     */
    public function update(
        SocialLinkUpdateRequest $request,
        SocialLink $socialLink
    ) {
        $this->authorize('update', $socialLink);

        $validated = $request->validated();

        $socialLink->update($validated);

        return redirect()
            ->route('social-links.edit', $socialLink)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SocialLink $socialLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, SocialLink $socialLink)
    {
        $this->authorize('delete', $socialLink);

        $socialLink->delete();

        return redirect()
            ->route('social-links.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
