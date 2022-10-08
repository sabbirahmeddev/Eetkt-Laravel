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
                @can('create', App\Models\Car::class)
                <a href="{{ route('cars.create') }}" class="btn btn-primary">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.cars.index_title')</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover table-striped">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.cars.inputs.car_brand_id')
                            </th>
                            <th class="text-right">
                                @lang('crud.cars.inputs.number')
                            </th>
                            <th class="text-left">
                                @lang('crud.cars.inputs.image')
                            </th>
                            <th class="text-left">
                                @lang('crud.cars.inputs.video')
                            </th>
                            <th class="text-left">
                                @lang('crud.cars.inputs.car_driver_id')
                            </th>
                            <th class="text-right">
                                @lang('crud.cars.inputs.seat_count')
                            </th>
                            <th class="text-right">
                                @lang('crud.cars.inputs.cost')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cars as $car)
                        <tr>
                            <td>{{ optional($car->carBrand)->name ?? '-' }}</td>
                            <td>{{ $car->number ?? '-' }}</td>
                            <td>
                                <x-partials.thumbnail
                                    src="{{ $car->image ? \Storage::url($car->image) : '' }}"
                                />
                            </td>
                            <td>{{ $car->video ?? '-' }}</td>
                            <td>
                                {{ optional($car->carDriver)->name ?? '-' }}
                            </td>
                            <td>{{ $car->seat_count ?? '-' }}</td>
                            <td>{{ $car->cost ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $car)
                                    <a href="{{ route('cars.edit', $car) }}">
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $car)
                                    <a href="{{ route('cars.show', $car) }}">
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $car)
                                    <form
                                        action="{{ route('cars.destroy', $car) }}"
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
                            <td colspan="8">{!! $cars->render() !!}</td>
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
