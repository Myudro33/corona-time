@extends('layout')

@section('content')
    <x-dashboard>
        <div class="xs:mt-6 md:mt-10 md:w-60 xs:w-48 flex justify-between">
            <a class="h-10" href="/worldwide">Worldwide</a>
            <a class="border-b-4 border-black h-10" href="/bycountry">By country</a>
        </div>
    </x-dashboard>
@endsection
