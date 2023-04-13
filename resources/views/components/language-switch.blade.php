@php
    $lang = app()->getLocale();
@endphp

<div {{ $attributes(['class' => 'w-24 text-center absolute md:left-[45%] xs:right-5 top-6 p-2 rounded-md bg-gray-200']) }}
    x-data="{ show: false }">
    <button @click="show = !show">{{ $lang == 'en' ? 'English' : 'ქართული' }}</button>
    <div style="display: none" x-show="show">
        <a class="block" href="/locale/en">English</a>
        <a class="block" href="/locale/ka">ქართული</a>
    </div>
</div>
