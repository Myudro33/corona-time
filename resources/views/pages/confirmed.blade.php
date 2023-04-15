@extends('layout')

@section('content')
    <div class="w-screen h-screen flex flex-col xs:p-4 md:p-10">
        <x-language-switch class="md:left-10" />
        <img class="xs:w-32 md:w-44 md:mx-auto" src="/assets/logo.png" alt="">
        <div class="m-auto w-11/12 flex flex-col justify-center items-center">
            <img class="w-14 h-14" src="/assets/icon.gif" alt="">
            <h1 class="mt-4 text-lg font-normal text-center">@lang('verification.confirmed')</h1>
            <a href="/login"
                class="md:w-[392px] xs:h-12 xs:translate-y-48 md:translate-y-0 bg-[#0FBA68] w-full h-14 text-white font-black text-base rounded-lg md:mt-[75px] flex justify-center items-center">
                @lang('verification.sign_in')
            </a>
        </div>
    </div>
@endsection
