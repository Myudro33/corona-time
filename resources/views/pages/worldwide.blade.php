@extends('layout')

@section('content')
    <x-dashboard>
        <div class="xs:mt-6 md:mt-10 md:w-60 xs:w-48 flex justify-between">
            <a class="border-b-4 border-black h-10" href="/worldwide">Worldwide</a>
            <a class="h-10" href="/bycountry">By country</a>
        </div>
        <div class="flex xs:mt-6 md:mt-10 w-full md:h-auto xs:h-[420px] justify-between flex-wrap">
            <x-worldwide-statistics class="xs:w-full xs:h-48" title="New cases" quantity="{{ $confirmed }}"
                background='#202bf315' color='#2029F3' image='assets/blue.svg' />
            <x-worldwide-statistics class="xs:w-[48%] xs:h-11/12" title="Recovered" quantity="{{ $recovered }}"
                background='#0FBA6815' color='#0FBA68' image='assets/green.svg' />
            <x-worldwide-statistics class="xs:w-[48%] xs:h-11/12" title="Deaths" quantity="{{ $deaths }}"
                background='#EAD62115' color='#EAD621' image='assets/yellow.svg' />
        </div>
    </x-dashboard>
@endsection
