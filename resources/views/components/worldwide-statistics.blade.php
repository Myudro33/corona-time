@props(['title', 'quantity', 'image', 'color', 'background'])

<div class="h-full w-[392px] flex flex-col items-center bg-[{{ $background }}] rounded-2xl">
    <img class="w-[90px] h-[64px] mt-10" src="{{ $image }}" alt="">
    <h1 class="mt-6 font-medium text-xl text-[#010414]">{{ $title }}</h1>
    <h1 class="text-[{{ $color }}] text-4xl font-black mt-4">{{ number_format($quantity) }}</h1>
</div>
