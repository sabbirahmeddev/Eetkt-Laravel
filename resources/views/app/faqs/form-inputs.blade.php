@php $editing = isset($faq) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="question"
            label="Question"
            maxlength="255"
            required
            >{{ old('question', ($editing ? $faq->question : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="answer" label="Answer" maxlength="255" required
            >{{ old('answer', ($editing ? $faq->answer : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
