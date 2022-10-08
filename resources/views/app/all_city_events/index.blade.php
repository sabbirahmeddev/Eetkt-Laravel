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
                @can('create', App\Models\CityEvents::class)
                <a
                    href="{{ route('city-events.create') }}"
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
                    @lang('crud.all_city_events.index_title')
                </h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover table-striped">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.all_city_events.inputs.name')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_city_events.inputs.image')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_city_events.inputs.description')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_city_events.inputs.event_type_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_city_events.inputs.city_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cityEvents as $cityEvent)
                        <tr>
                            <td>{{ $cityEvent->name ?? '-' }}</td>
                            <td>
                                <x-partials.thumbnail
                                    src="{{ $cityEvent->image ? \Storage::url($cityEvent->image) : '' }}"
                                />
                            </td>
                            <td>{{ $cityEvent->description ?? '-' }}</td>
                            <td>
                                {{ optional($cityEvent->eventType)->name ?? '-'
                                }}
                            </td>
                            <td>
                                {{ optional($cityEvent->city)->name ?? '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $cityEvent)
                                    <a
                                        href="{{ route('city-events.edit', $cityEvent) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $cityEvent)
                                    <a
                                        href="{{ route('city-events.show', $cityEvent) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $cityEvent)
                                    <form
                                        action="{{ route('city-events.destroy', $cityEvent) }}"
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
                            <td colspan="6">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6">
                                {!! $cityEvents->render() !!}
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
