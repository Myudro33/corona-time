@extends('layout')

@section('content')
    <x-dashboard>
        <div class="xs:w-11/12 md:w-full m-auto">
            <div class="xs:mt-6 md:mt-10 md:px-0 md:w-60 xs:w-56 flex justify-between">
                <a class="border-b-4 border-black font-bold h-10" href="/">@lang('dashboard.worldwide')</a>
                <a class="h-10" href="/bycountry">@lang('dashboard.by_country')</a>
            </div>
            <hr>
        </div>
        <div class="flex xs:mt-6 xs:px-4 md:px-0 md:mt-10 w-full md:h-auto xs:h-[420px] justify-between flex-wrap">
            <x-worldwide-statistics class="xs:w-full xs:h-48 md:w-full md:h-64 md:mb-5" title="{{__('dashboard.new_cases')}}" quantity="{{ $confirmed }}"
                background='#202bf315' color='#2029F3' image='assets/blue.svg' />
            <x-worldwide-statistics class="xs:w-[48%] xs:h-11/12 md:h-64" title="{{__('dashboard.recovered')}}" quantity="{{ $recovered }}"
                background='#0FBA6815' color='#0FBA68' image='assets/green.svg' />
            <x-worldwide-statistics class="xs:w-[48%] xs:h-11/12 md:h-64" title="{{__('dashboard.deaths')}}" quantity="{{ $deaths }}"
                background='#EAD62115' color='#EAD621' image='assets/yellow.svg' />
        </div>
    </x-dashboard>
@endsection
