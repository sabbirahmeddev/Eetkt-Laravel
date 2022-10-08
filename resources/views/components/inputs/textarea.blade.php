@props(['name', 'label'])

@if ($label ?? null)
    @include('components.inputs.partials.label')
@endif


<div class="mb-4">
    <textarea id="{{ $name }}" name="{{ $name }}" rows="3" {{ $required ?? false ? 'required' : '' }}
        {{ $attributes->merge(['class' => 'form-control']) }} autocomplete="off">{{ $slot }}</textarea>
</div>


@error($name)
    @include('components.inputs.partials.error')
@enderror
