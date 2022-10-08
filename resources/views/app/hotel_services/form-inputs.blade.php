@php $editing = isset($hotelService) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="hotel_id" label="Hotel" required>
            @php $selected = old('hotel_id', ($editing ? $hotelService->hotel_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Hotel</option>
            @foreach($hotels as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $hotelService->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="cost"
            label="Cost"
            :value="old('cost', ($editing ? $hotelService->cost : ''))"
            max="255"
            step="0.01"
            placeholder="Cost"
            required
        ></x-inputs.number>
    </x-inputs.group>
</div>
