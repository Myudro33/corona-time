@extends('layout')

@section('content')
    <div class="w-screen h-screen flex justify-between">
        <div class="md:pt-10 xs:w-screen xs:pt-6 xs:px-4 md:pl-28 md:w-[836px] h-full">
            <a href="/">
                <img class="w-44 h-11" src="assets/logo.png" alt="logo">
            </a>
            <h1 class="text-[#010414] font-black xs:text-xl md:text-[25px] mt-14">@lang('login.welcome_back')</h1>
            <h1 class="text-[#808189] font-normal xs:text-base md:text-xl mt-4">@lang('login.details')</h1>
        <x-_login/>
        </div>
        <img class="right w-[604px] h-full hidden md:block" src="assets/covid-19.png" alt="">
    </div>
@endsection
