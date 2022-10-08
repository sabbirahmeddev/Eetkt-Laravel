@extends('backend.layouts.app')

@section('content')
<div class="d-flex flex-column flex-column-fluid x">
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
<div class="card flex-row-fluid mb-2 mt-4">
	<div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700">
            <h4 class="card-title">
                <a href="{{ route('cars.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.cars.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.cars.inputs.car_brand_id')</h5>
                    <span>{{ optional($car->carBrand)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cars.inputs.number')</h5>
                    <span>{{ $car->number ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cars.inputs.image')</h5>
                    <x-partials.thumbnail
                        src="{{ $car->image ? \Storage::url($car->image) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cars.inputs.video')</h5>
                    <span>{{ $car->video ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cars.inputs.car_driver_id')</h5>
                    <span>{{ optional($car->carDriver)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cars.inputs.seat_count')</h5>
                    <span>{{ $car->seat_count ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.cars.inputs.cost')</h5>
                    <span>{{ $car->cost ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('cars.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Car::class)
                <a href="{{ route('cars.create') }}" class="btn btn-light">
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
