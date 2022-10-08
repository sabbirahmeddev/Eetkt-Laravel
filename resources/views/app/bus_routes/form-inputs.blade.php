@php $editing = isset($busRoute) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="bus_id" label="Bus" required>
            @php $selected = old('bus_id', ($editing ? $busRoute->bus_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Bus</option>
            @foreach($buses as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="from" label="From" required>
            @php $selected = old('from', ($editing ? $busRoute->from : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the City</option>
            @foreach($cities as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="to" label="To" required>
            @php $selected = old('to', ($editing ? $busRoute->to : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the City</option>
            @foreach($cities as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.datetime
            name="start_time"
            label="Start Time"
            value="{{ old('start_time', ($editing ? optional($busRoute->start_time)->format('Y-m-d\TH:i:s') : '')) }}"
            max="255"
            required
        ></x-inputs.datetime>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.datetime
            name="end_time"
            label="End Time"
            value="{{ old('end_time', ($editing ? optional($busRoute->end_time)->format('Y-m-d\TH:i:s') : '')) }}"
            max="255"
            required
        ></x-inputs.datetime>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="seat_cost"
            label="Seat Cost"
            :value="old('seat_cost', ($editing ? $busRoute->seat_cost : ''))"
            max="255"
            step="0.01"
            placeholder="Seat Cost"
            required
        ></x-inputs.number>
    </x-inputs.group>
</div>
