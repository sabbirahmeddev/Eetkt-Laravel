@php $editing = isset($bus) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $bus->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="model" label="Model" maxlength="255" required
            >{{ old('model', ($editing ? $bus->model : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
