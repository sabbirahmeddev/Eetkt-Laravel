@extends('backend.layouts.app')

@section('content')
<div class="d-flex flex-column flex-column-fluid x">
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
<div class="card flex-row-fluid mb-2 mt-4">
	<div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700">
            <h4 class="card-title">
                <a href="{{ route('destination-blogs.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.destination_blogs.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.destination_blogs.inputs.image')</h5>
                    <x-partials.thumbnail
                        src="{{ $destinationBlog->image ? \Storage::url($destinationBlog->image) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.destination_blogs.inputs.title')</h5>
                    <span>{{ $destinationBlog->title ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.destination_blogs.inputs.description')</h5>
                    <span>{{ $destinationBlog->description ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.destination_blogs.inputs.tags')</h5>
                    <span>{{ $destinationBlog->tags ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.destination_blogs.inputs.status')</h5>
                    <span>{{ $destinationBlog->status ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.destination_blogs.inputs.city_id')</h5>
                    <span
                        >{{ optional($destinationBlog->city)->name ?? '-'
                        }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('destination-blogs.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\DestinationBlog::class)
                <a
                    href="{{ route('destination-blogs.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
 </div>
    </div>
</div>
</div>
</div>
@endsection
