@extends('layout')
@section('content')
    <div class="flex flex-col md:items-center w-full h-screen xs:py-6 xs:px-4 md:py-14">
        <x-language-switch/>
        <img class="w-44 h-11" src="/assets/logo.png" alt="logo">
        <form class="xs:h-screen xs:flex xs:flex-col xs:justify-between md:w-[392px] md:h-auto md:mt-36" action="#"
            method="post">
            <div>
                <h1 class="text-[#010414] font-black xs:text-xl md:text-[25px] xs:my-10 md:my-14  text-center">
                    @lang('reset.heading')</h1>
                <label class="text-[#010414] font-bold text-base mt-6" for="email">@lang('reset.email')</label>
                <input class="w-full h-14 pl-6 py-4 border border-[#E6E6E7] rounded-lg my-2" type="email"
                    placeholder="@lang('reset.email_placeholder')">
            </div>
            <button type="submit"
                class="bg-[#0FBA68] w-full h-14 text-white font-black text-base rounded-lg md:mt-[75px]">@lang('reset.sign_up')</button>
        </form>
    </div>
@endsection
