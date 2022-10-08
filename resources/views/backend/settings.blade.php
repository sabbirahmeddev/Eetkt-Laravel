@extends('backend.layouts.app')

@section('content')
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Settings</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted text-hover-primary">Admin</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Settings</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->

            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->








    </div>
    <!--end::Content wrapper-->




    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Row-->
        <div class="row g-5 g-xl-10 mb-xl-10">



            <!--begin::Col-->
            <div class="col-lg-12">
                <!--begin::Chart widget 3-->
                <div class="card" style="min-height: 70vh">

                    <!--begin::Card body-->
                    <div class="card-body">



                        <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-5 fs-6">

                            @foreach (App\Models\SettingGroup::get() as $group)
                                <li class="nav-item">
                                    <a class="nav-link @if ($loop->first) active @endif" data-bs-toggle="tab"
                                        href="#kt_tab_pane_{{ $group->id }}">{{ $group->name }}</a>
                                </li>
                            @endforeach
                        </ul>

                        <div class="tab-content" id="myTabContent">

                            @foreach (App\Models\SettingGroup::get() as $group)
                                <div class="tab-pane fade @if ($loop->first) show active @endif"
                                    id="kt_tab_pane_{{ $group->id }}" role="tabpanel">
                                    @foreach (App\Models\Setting::where(['setting_group_id' => $group->id])->get() as $setting)
                                        @if ($setting->type == 'text')
                                            <div class="form-group mb-4 col-sm-12">

                                                <label class="label  mb-2" for="title">
                                                    {{ $setting->property }}
                                                </label>

                                                <input type="text" id="title" name="title" value=""
                                                    class="form-control" maxlength="255" placeholder="Title"
                                                    required="required" autocomplete="off">
                                            </div>
                                        @endif

                                        @if ($setting->type == 'textarea')
                                            <div class="form-group mb-4 col-sm-12">

                                                <label class="label  mb-2" for="title">
                                                    {{ $setting->property }}
                                                </label>

                                                <textarea name="" class="form-control" id="" cols="30" rows="10"></textarea>
                                            </div>
                                        @endif


                                        @if ($setting->type == 'image')
                                            <div class="form-group mb-4 col-sm-12">
                                                <div x-data="imageViewer('')">
                                                    <label class="label  mb-2" for="image">
                                                        {{ $setting->property }}
                                                    </label>
                                                    <br>

                                                    <!-- Show the image -->
                                                    <template x-if="imageUrl">
                                                        <img :src="imageUrl"
                                                            class="object-cover rounded border border-gray-200"
                                                            style="width: 100px; height: 100px;">
                                                    </template>

                                                    <!-- Show the gray box when image is not available -->
                                                    <template x-if="!imageUrl">
                                                        <div class="border rounded border-gray-200 bg-gray-100"
                                                            style="width: 100px; height: 100px;"></div>
                                                    </template>

                                                    <div class="mt-2">
                                                        <input type="file" name="image" id="image"
                                                            @change="fileChosen">
                                                    </div>

                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach



                        </div>

                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Chart widget 3-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->







    </div>
@endsection
