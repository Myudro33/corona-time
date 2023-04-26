@extends('layout')

@section('content')
    <x-navbar />
    <div class="md:px-28 xs:px-0 md:mt-10 xs:mt-6 ">
        <h1 class="text-[#010414] font-extrabold md:text-2xl xs:text-lg md:mx-0 xs:mx-4 ">@lang('dashboard.heading_title')</h1>
        <div>
            {{$slot}}
        </div>
    </div>
@endsection
