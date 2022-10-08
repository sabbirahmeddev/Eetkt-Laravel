<?php

namespace App\Http\Controllers\Api;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DestinationBlogResource;
use App\Http\Resources\DestinationBlogCollection;

class CityDestinationBlogsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\City $city
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, City $city)
    {
        $this->authorize('view', $city);

        $search = $request->get('search', '');

        $destinationBlogs = $city
            ->destinationBlogs()
            ->search($search)
            ->latest()
            ->paginate();

        return new DestinationBlogCollection($destinationBlogs);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\City $city
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, City $city)
    {
        $this->authorize('create', DestinationBlog::class);

        $validated = $request->validate([
            'image' => ['nullable', 'image', 'max:1024'],
            'title' => ['required', 'max:255', 'string'],
            'description' => ['required', 'max:255', 'string'],
            'tags' => ['required', 'max:255', 'string'],
            'status' => ['required', 'max:255'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $destinationBlog = $city->destinationBlogs()->create($validated);

        return new DestinationBlogResource($destinationBlog);
    }
}
