@php $editing = isset($insurance) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $insurance->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            required
            >{{ old('description', ($editing ? $insurance->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="insurance_agency_id"
            label="Insurance Agency"
            required
        >
            @php $selected = old('insurance_agency_id', ($editing ? $insurance->insurance_agency_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Insurance Agency</option>
            @foreach($insuranceAgencies as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
