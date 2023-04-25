@extends('layout')

@section('content')
    <x-dashboard>
        <div class="xs:mt-6 md:mt-10 xs:px-4 md:px-0 md:w-60 xs:w-56 flex justify-between">
            <a class="h-10" href="/worldwide">@lang('dashboard.worldwide')</a>
            <a class="border-b-4 border-black font-bold h-10" href="/bycountry">@lang('dashboard.by_country')</a>
        </div>
        <div class="w-60 h-12 mt-10 relative md:mx-0 xs:mx-4">
            <form action="" method="get">
                @if (request('sort'))
                    <input type="hidden" name="sort" value="{{ request('sort') }}">
                    <input type="hidden" name="order" value="{{ request('order') }}">
                @endif
                <input class="pl-12 w-60 h-12 border border-[#E6E6E7] rounded-lg focus:outline-[#2029F3] focus:shadow-bd"
                    type="text" name="search" placeholder="{{ __('dashboard.input_placeholder') }}">
                <img class="absolute top-4 left-5" src="/assets/search.svg" alt="">
            </form>
        </div>
        <x-table confirmed="{{ $confirmed }}" deaths="{{ $deaths }}" recovered="{{ $recovered }}"
            :countries="$countries" />
    </x-dashboard>
@endsection
