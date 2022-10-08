@php $editing = isset($hotelFacility) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $hotelFacility->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="hotel_id" label="Hotel" required>
            @php $selected = old('hotel_id', ($editing ? $hotelFacility->hotel_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Hotel</option>
            @foreach($hotels as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
