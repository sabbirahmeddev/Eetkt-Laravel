@php $editing = isset($setting) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="property"
            label="Property"
            :value="old('property', ($editing ? $setting->property : ''))"
            maxlength="255"
            placeholder="Property"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="value"
            label="Value"
            :value="old('value', ($editing ? $setting->value : ''))"
            maxlength="255"
            placeholder="Value"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="type"
            label="Type"
            :value="old('type', ($editing ? $setting->type : ''))"
            maxlength="255"
            placeholder="Type"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="setting_group_id" label="Setting Group" required>
            @php $selected = old('setting_group_id', ($editing ? $setting->setting_group_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Setting Group</option>
            @foreach($settingGroups as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
