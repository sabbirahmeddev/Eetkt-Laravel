@extends('backend.layouts.app')

@section('content')
<div class="d-flex flex-column flex-column-fluid x"><div id="kt_app_content" class="app-content flex-column-fluid"><div id="kt_app_content_container" class="app-container container-fluid">
    <div class="searchbar mt-0 mb-4 mt-4">
        <div class="row">
            <div class="col-md-6">
                <form>
                    <div class="input-group">
                        <input
                            id="indexSearch"
                            type="text"
                            name="search"
                            placeholder="{{ __('crud.common.search') }}"
                            value="{{ $search ?? '' }}"
                            class="form-control"
                            autocomplete="off"
                        />
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                                <i class="icon ion-md-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-right">
                @can('create', App\Models\Blog::class)
                <a href="{{ route('blogs.create') }}" class="btn btn-primary">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

<div class="card flex-row-fluid mb-2">
	<div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.blogs.index_title')</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.blogs.inputs.title')
                            </th>
                            <th class="text-left">
                                @lang('crud.blogs.inputs.image')
                            </th>
                            <th class="text-left">
                                @lang('crud.blogs.inputs.blog_category_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.blogs.inputs.status')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($blogs as $blog)
                        <tr>
                            <td>{{ $blog->title ?? '-' }}</td>
                            <td>
                                <x-partials.thumbnail
                                    src="{{ $blog->image ? \Storage::url($blog->image) : '' }}"
                                />
                            </td>

                            <td>
                                {{ optional($blog->blogCategory)->name ?? '-' }}
                            </td>
                            <td>{{ $blog->status ? 'Published' : 'In Draft' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $blog)
                                    <a href="{{ route('blogs.edit', $blog) }}">
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $blog)
                                    <a href="{{ route('blogs.show', $blog) }}">
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $blog)
                                    <form
                                        action="{{ route('blogs.destroy', $blog) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="8">{!! $blogs->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div></div></div>
@endsection
