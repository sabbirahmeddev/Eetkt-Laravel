<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\DestinationBlog;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\DestinationBlogResource;
use App\Http\Resources\DestinationBlogCollection;
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
            ->paginate();

        return new DestinationBlogCollection($destinationBlogs);
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

        return new DestinationBlogResource($destinationBlog);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DestinationBlog $destinationBlog
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DestinationBlog $destinationBlog)
    {
        $this->authorize('view', $destinationBlog);

        return new DestinationBlogResource($destinationBlog);
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

        return new DestinationBlogResource($destinationBlog);
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

        return response()->noContent();
    }
}
