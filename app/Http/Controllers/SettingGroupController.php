<?php

namespace App\Http\Controllers;

use App\Models\SettingGroup;
use Illuminate\Http\Request;
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
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.setting_groups.index',
            compact('settingGroups', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', SettingGroup::class);

        return view('app.setting_groups.create');
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

        return redirect()
            ->route('setting-groups.edit', $settingGroup)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SettingGroup $settingGroup
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, SettingGroup $settingGroup)
    {
        $this->authorize('view', $settingGroup);

        return view('app.setting_groups.show', compact('settingGroup'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SettingGroup $settingGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, SettingGroup $settingGroup)
    {
        $this->authorize('update', $settingGroup);

        return view('app.setting_groups.edit', compact('settingGroup'));
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

        return redirect()
            ->route('setting-groups.edit', $settingGroup)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('setting-groups.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
