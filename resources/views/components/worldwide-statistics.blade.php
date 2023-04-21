@props(['title', 'quantity', 'image', 'color', 'background'])

<div {{ $attributes(['class' =>'md:h-[255px] md:w-[392px] flex flex-col items-center rounded-2xl'])}} style="background-color: {{ $background }}">
    <img class="w-[90px] h-[64px] md:mt-10 xs:mt-2" src="{{ $image }}" alt="">
    <h1 class="mt-6 font-medium md:text-xl xs:text-base text-[#010414]">{{ $title }}</h1>
    <h1 style="color: {{ $color }}" class="md:text-4xl xs:text-2xl font-black mt-4">{{ number_format($quantity) }}</h1>
</div>
