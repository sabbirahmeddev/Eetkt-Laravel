@php $editing = isset($page) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="title"
            label="Title"
            :value="old('title', ($editing ? $page->title : ''))"
            maxlength="255"
            placeholder="Title"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="content"
            label="Content"
            maxlength="255"
            required
            >{{ old('content', ($editing ? $page->content : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="tags"
            label="Tags"
            :value="old('tags', ($editing ? $page->tags : ''))"
            maxlength="255"
            placeholder="Tags"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="short_description"
            label="Short Description"
            maxlength="255"
            required
            >{{ old('short_description', ($editing ? $page->short_description :
            '')) }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
