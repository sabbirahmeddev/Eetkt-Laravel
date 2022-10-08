@extends('backend.layouts.app')

@section('content')
<div class="d-flex flex-column flex-column-fluid x">
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
<div class="card flex-row-fluid mb-2 mt-4">
	<div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700">
            <h4 class="card-title">
                <a href="{{ route('settings.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.settings.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.settings.inputs.property')</h5>
                    <span>{{ $setting->property ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.settings.inputs.value')</h5>
                    <span>{{ $setting->value ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.settings.inputs.type')</h5>
                    <span>{{ $setting->type ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.settings.inputs.setting_group_id')</h5>
                    <span
                        >{{ optional($setting->settingGroup)->name ?? '-'
                        }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('settings.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Setting::class)
                <a href="{{ route('settings.create') }}" class="btn btn-light">
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
