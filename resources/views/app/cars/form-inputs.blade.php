@php $editing = isset($car) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="car_brand_id" label="Car Brand" required>
            @php $selected = old('car_brand_id', ($editing ? $car->car_brand_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Car Brand</option>
            @foreach($carBrands as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="number"
            label="Number"
            :value="old('number', ($editing ? $car->number : ''))"
            max="255"
            placeholder="Number"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <div
            x-data="imageViewer('{{ $editing && $car->image ? \Storage::url($car->image) : '' }}')"
        >
            <x-inputs.partials.label
                name="image"
                label="Image"
            ></x-inputs.partials.label
            ><br />

            <!-- Show the image -->
            <template x-if="imageUrl">
                <img
                    :src="imageUrl"
                    class="object-cover rounded border border-gray-200"
                    style="width: 100px; height: 100px;"
                />
            </template>

            <!-- Show the gray box when image is not available -->
            <template x-if="!imageUrl">
                <div
                    class="border rounded border-gray-200 bg-gray-100"
                    style="width: 100px; height: 100px;"
                ></div>
            </template>

            <div class="mt-2">
                <input
                    type="file"
                    name="image"
                    id="image"
                    @change="fileChosen"
                />
            </div>

            @error('image') @include('components.inputs.partials.error')
            @enderror
        </div>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="video"
            label="Video"
            :value="old('video', ($editing ? $car->video : ''))"
            maxlength="255"
            placeholder="Video"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="car_driver_id" label="Car Driver" required>
            @php $selected = old('car_driver_id', ($editing ? $car->car_driver_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Car Driver</option>
            @foreach($carDrivers as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="seat_count"
            label="Seat Count"
            :value="old('seat_count', ($editing ? $car->seat_count : ''))"
            max="255"
            placeholder="Seat Count"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="cost"
            label="Cost"
            :value="old('cost', ($editing ? $car->cost : ''))"
            max="255"
            step="0.01"
            placeholder="Cost"
            required
        ></x-inputs.number>
    </x-inputs.group>
</div>
