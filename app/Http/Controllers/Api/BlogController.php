<?php

namespace App\Http\Controllers\Api;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Resources\BlogResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogCollection;
use App\Http\Requests\BlogStoreRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\BlogUpdateRequest;

class BlogController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Blog::class);

        $search = $request->get('search', '');

        $blogs = Blog::search($search)
            ->latest()
            ->paginate();

        return new BlogCollection($blogs);
    }

    /**
     * @param \App\Http\Requests\BlogStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogStoreRequest $request)
    {
        $this->authorize('create', Blog::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $blog = Blog::create($validated);

        return new BlogResource($blog);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Blog $blog)
    {
        $this->authorize('view', $blog);

        return new BlogResource($blog);
    }

    /**
     * @param \App\Http\Requests\BlogUpdateRequest $request
     * @param \App\Models\Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function update(BlogUpdateRequest $request, Blog $blog)
    {
        $this->authorize('update', $blog);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($blog->image) {
                Storage::delete($blog->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $blog->update($validated);

        return new BlogResource($blog);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Blog $blog)
    {
        $this->authorize('delete', $blog);

        if ($blog->image) {
            Storage::delete($blog->image);
        }

        $blog->delete();

        return response()->noContent();
    }
}
