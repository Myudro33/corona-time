@php
    $lang = app()->getLocale();
@endphp

<div x-data="{ show: false }" class=" w-24 text-center absolute md:left-[45%] xs:right-5 top-5 p-2 rounded-md bg-gray-200">
    <button @click="show = !show">{{ $lang == 'en' ? 'English' : 'ქართული' }}</button>
    <div style="display: none" x-show="show">
        <a class="block" href="/locale/en">English</a>
        <a class="block" href="/locale/ka">ქართული</a>
    </div>
</div>
