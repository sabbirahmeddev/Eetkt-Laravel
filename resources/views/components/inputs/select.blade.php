@props([
    'name',
    'label',
    'type' => 'text',
])

@if($label ?? null)
    @include('components.inputs.partials.label')
@endif



<div class="mb-4">
    <select
    id="{{ $name }}"
    name="{{ $name }}"
    {{ ($required ?? false) ? 'required' : '' }}
    {{ $attributes->merge(['class' => 'form-control']) }}
    autocomplete="off"
>{{ $slot }}</select>
</div>



@error($name)
    @include('components.inputs.partials.error')
@enderror
