@extends('layout')
@section('content')
    <div class="flex flex-col md:items-center w-full h-screen xs:py-6 xs:px-4 md:py-14">
        <x-language-switch class="md:left-10" />
        <img class="w-44 h-11" src="/assets/logo.png" alt="logo">
        <form class="xs:h-screen xs:flex xs:flex-col xs:justify-between md:w-[392px] md:h-auto md:mt-36" action="{{{ route('password.update') }}}"
            method="post">
           @csrf
            <div>
                <h1 class="text-[#010414] font-black xs:text-xl md:text-[25px] xs:my-10 md:my-14  text-center">
                    @lang('reset.heading')</h1>
                <label class="text-[#010414] font-bold text-base mt-6" for="email">@lang('register.email')</label>
                <div class="relative">
                    <input class="w-full h-14 pl-6 py-4 border rounded-lg my-1 focus:outline-[#2029F3] focus:shadow-bd {{!$errors->any() ? "border-[#E6E6E7]" : ($errors->has('email') ? "border-error" : "border-success")}}" type="text" name="email"
                    id="email" placeholder="@lang('register.email_placeholder')">
                    {!! !$errors->any() ? "" : ($errors->has('email') ? "" : "<img class='absolute w-5 right-3 bottom-5' src='/assets/success.png' />")!!}
                </div>
                <x-error name="email" />
            </div>
            <x-button class="md:mt-14" >@lang('reset.sign_up')</x-button>
        </form>
    </div>
@endsection
