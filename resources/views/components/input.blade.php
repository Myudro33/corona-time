@props(['name', 'type', 'placeholder','value'])
<div class="relative">
    <input
        value="{{$errors->has($name)?old(''):old("$name")}}"
        class="w-full h-14 pl-6 py-4 border rounded-lg my-1 focus:outline-[#2029F3] focus:shadow-bd 
        {{ !$errors->any() ? 'border-[#E6E6E7]' : ($errors->has($name) ? 'border-error' : 'border-success') }}"
        type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder }}">
    {!! !$errors->any()
        ? ''
        : ($errors->has($name)
            ? ''
            : "<img class='absolute w-5 right-3 bottom-5' src='/assets/success.svg' />") !!}
</div>
