<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use App\Models\DestinationBlog;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\DestinationBlogStoreRequest;
use App\Http\Requests\DestinationBlogUpdateRequest;

class DestinationBlogController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', DestinationBlog::class);

        $search = $request->get('search', '');

        $destinationBlogs = DestinationBlog::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.destination_blogs.index',
            compact('destinationBlogs', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', DestinationBlog::class);

        $cities = City::pluck('name', 'id');

        return view('app.destination_blogs.create', compact('cities'));
    }

    /**
     * @param \App\Http\Requests\DestinationBlogStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DestinationBlogStoreRequest $request)
    {
        $this->authorize('create', DestinationBlog::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $destinationBlog = DestinationBlog::create($validated);

        return redirect()
            ->route('destination-blogs.edit', $destinationBlog)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DestinationBlog $destinationBlog
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DestinationBlog $destinationBlog)
    {
        $this->authorize('view', $destinationBlog);

        return view('app.destination_blogs.show', compact('destinationBlog'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DestinationBlog $destinationBlog
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, DestinationBlog $destinationBlog)
    {
        $this->authorize('update', $destinationBlog);

        $cities = City::pluck('name', 'id');

        return view(
            'app.destination_blogs.edit',
            compact('destinationBlog', 'cities')
        );
    }

    /**
     * @param \App\Http\Requests\DestinationBlogUpdateRequest $request
     * @param \App\Models\DestinationBlog $destinationBlog
     * @return \Illuminate\Http\Response
     */
    public function update(
        DestinationBlogUpdateRequest $request,
        DestinationBlog $destinationBlog
    ) {
        $this->authorize('update', $destinationBlog);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($destinationBlog->image) {
                Storage::delete($destinationBlog->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $destinationBlog->update($validated);

        return redirect()
            ->route('destination-blogs.edit', $destinationBlog)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DestinationBlog $destinationBlog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, DestinationBlog $destinationBlog)
    {
        $this->authorize('delete', $destinationBlog);

        if ($destinationBlog->image) {
            Storage::delete($destinationBlog->image);
        }

        $destinationBlog->delete();

        return redirect()
            ->route('destination-blogs.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
