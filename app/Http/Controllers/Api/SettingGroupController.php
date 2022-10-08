<?php

namespace App\Http\Controllers\Api;

use App\Models\SettingGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SettingGroupResource;
use App\Http\Resources\SettingGroupCollection;
use App\Http\Requests\SettingGroupStoreRequest;
use App\Http\Requests\SettingGroupUpdateRequest;

class SettingGroupController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', SettingGroup::class);

        $search = $request->get('search', '');

        $settingGroups = SettingGroup::search($search)
            ->latest()
            ->paginate();

        return new SettingGroupCollection($settingGroups);
    }

    /**
     * @param \App\Http\Requests\SettingGroupStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SettingGroupStoreRequest $request)
    {
        $this->authorize('create', SettingGroup::class);

        $validated = $request->validated();

        $settingGroup = SettingGroup::create($validated);

        return new SettingGroupResource($settingGroup);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SettingGroup $settingGroup
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, SettingGroup $settingGroup)
    {
        $this->authorize('view', $settingGroup);

        return new SettingGroupResource($settingGroup);
    }

    /**
     * @param \App\Http\Requests\SettingGroupUpdateRequest $request
     * @param \App\Models\SettingGroup $settingGroup
     * @return \Illuminate\Http\Response
     */
    public function update(
        SettingGroupUpdateRequest $request,
        SettingGroup $settingGroup
    ) {
        $this->authorize('update', $settingGroup);

        $validated = $request->validated();

        $settingGroup->update($validated);

        return new SettingGroupResource($settingGroup);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SettingGroup $settingGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, SettingGroup $settingGroup)
    {
        $this->authorize('delete', $settingGroup);

        $settingGroup->delete();

        return response()->noContent();
    }
}
