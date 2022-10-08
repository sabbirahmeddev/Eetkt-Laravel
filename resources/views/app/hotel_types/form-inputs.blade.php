@php $editing = isset($hotelType) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $hotelType->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="star"
            label="Star"
            :value="old('star', ($editing ? $hotelType->star : ''))"
            max="255"
            placeholder="Star"
            required
        ></x-inputs.number>
    </x-inputs.group>
</div>
