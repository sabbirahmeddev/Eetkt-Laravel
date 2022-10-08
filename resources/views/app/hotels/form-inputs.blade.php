@php $editing = isset($hotel) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="Name"
            label="Name"
            :value="old('Name', ($editing ? $hotel->Name : ''))"
            maxlength="255"
            placeholder="Name"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="hotel_type_id" label="Hotel Type" required>
            @php $selected = old('hotel_type_id', ($editing ? $hotel->hotel_type_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Hotel Type</option>
            @foreach($hotelTypes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
