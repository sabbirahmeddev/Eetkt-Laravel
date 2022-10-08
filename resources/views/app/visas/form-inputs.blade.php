@php $editing = isset($visa) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="country_id" label="Country" required>
            @php $selected = old('country_id', ($editing ? $visa->country_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Country</option>
            @foreach($countries as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
