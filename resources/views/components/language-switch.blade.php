@php
    $lang = app()->getLocale();
@endphp

<div {{ $attributes(['class' => 'w-28 text-center absolute md:left-[45%] xs:right-5 top-6 p-2 rounded-md bg-white shadow-md']) }}
    x-data="{ show: false }">
    <button class="flex items-center" @click="show = !show">{{ $lang == 'en' ? 'English' : 'ქართული' }} <img class="mx-1"
            src="/assets/stroke.svg" alt="">
    </button>
    <div style="display: none" x-show="show">
        <a class="block" href="/locale/en">English</a>
        <a class="block" href="/locale/ka">ქართული</a>
    </div>
</div>
