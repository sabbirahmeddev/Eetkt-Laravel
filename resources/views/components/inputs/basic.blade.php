@props([
    'name',
    'label',
    'value',
    'type' => 'text',
    'min' => null,
    'max' => null,
    'step' => null,
])

@if($label ?? null)
    @include('components.inputs.partials.label')
@endif

<div class="mb-4">
    <input
    type="{{ $type }}"
    id="{{ $name }}"
    name="{{ $name }}"
    value="{{ old($name, $value ?? '') }}"
    {{ ($required ?? false) ? 'required' : '' }}
    {{ $attributes->merge(['class' => 'form-control']) }}
    {{ $min ? "min={$min}" : '' }}
    {{ $max ? "max={$max}" : '' }}
    {{ $step ? "step={$step}" : '' }}
    autocomplete="off"
>
</div>



@error($name)
    @include('components.inputs.partials.error')
@enderror
