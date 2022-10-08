@extends('backend.layouts.app')

@section('content')
<div class="d-flex flex-column flex-column-fluid x">
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
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
                @can('create', App\Models\DestinationBlog::class)
                <a
                    href="{{ route('destination-blogs.create') }}"
                    class="btn btn-primary"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.destination_blogs.index_title')
                </h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.destination_blogs.inputs.image')
                            </th>
                            <th class="text-left">
                                @lang('crud.destination_blogs.inputs.title')
                            </th>
                            <th class="text-left">
                                @lang('crud.destination_blogs.inputs.description')
                            </th>
                            <th class="text-left">
                                @lang('crud.destination_blogs.inputs.tags')
                            </th>
                            <th class="text-left">
                                @lang('crud.destination_blogs.inputs.status')
                            </th>
                            <th class="text-left">
                                @lang('crud.destination_blogs.inputs.city_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($destinationBlogs as $destinationBlog)
                        <tr>
                            <td>
                                <x-partials.thumbnail
                                    src="{{ $destinationBlog->image ? \Storage::url($destinationBlog->image) : '' }}"
                                />
                            </td>
                            <td>{{ $destinationBlog->title ?? '-' }}</td>
                            <td>{{ $destinationBlog->description ?? '-' }}</td>
                            <td>{{ $destinationBlog->tags ?? '-' }}</td>
                            <td>{{ $destinationBlog->status ?? '-' }}</td>
                            <td>
                                {{ optional($destinationBlog->city)->name ?? '-'
                                }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $destinationBlog)
                                    <a
                                        href="{{ route('destination-blogs.edit', $destinationBlog) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $destinationBlog)
                                    <a
                                        href="{{ route('destination-blogs.show', $destinationBlog) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $destinationBlog)
                                    <form
                                        action="{{ route('destination-blogs.destroy', $destinationBlog) }}"
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
                            <td colspan="7">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                {!! $destinationBlogs->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
 </div>
    </div>
</div>
</div>
</div>
@endsection
