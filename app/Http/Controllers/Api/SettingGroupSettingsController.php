<?php

namespace App\Http\Controllers\Api;

use App\Models\SettingGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SettingResource;
use App\Http\Resources\SettingCollection;

class SettingGroupSettingsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SettingGroup $settingGroup
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, SettingGroup $settingGroup)
    {
        $this->authorize('view', $settingGroup);

        $search = $request->get('search', '');

        $settings = $settingGroup
            ->settings()
            ->search($search)
            ->latest()
            ->paginate();

        return new SettingCollection($settings);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SettingGroup $settingGroup
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, SettingGroup $settingGroup)
    {
        $this->authorize('create', Setting::class);

        $validated = $request->validate([
            'property' => ['required', 'max:255', 'string'],
            'value' => ['required', 'max:255', 'string'],
            'type' => ['required', 'max:255', 'string'],
        ]);

        $setting = $settingGroup->settings()->create($validated);

        return new SettingResource($setting);
    }
}
