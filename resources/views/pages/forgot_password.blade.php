@extends('layout')
@section('content')
    <div class="flex flex-col md:items-center w-full h-screen xs:py-6 xs:px-4 md:py-14">
        <x-language-switch class="md:right-10 xs:right-5" />
        <img class="w-44 h-11" src="/assets/logo.svg" alt="logo">
        <form class="xs:h-screen xs:flex xs:flex-col xs:justify-between md:w-[392px] md:h-auto md:mt-36" action="{{{ route('password.email') }}}"
            method="post">
           @csrf
            <div>
                <h1 class="text-[#010414] font-black xs:text-xl md:text-[25px] xs:my-10 md:my-14  text-center">
                    @lang('reset.heading')</h1>
                <label class="text-[#010414] font-bold text-base mt-6" for="email">@lang('register.email')</label>
                <x-input type='text' name='email' placeholder="{{__('register.email_placeholder')}}" />
                <x-error name="email" />
            </div>
            <x-button class="md:mt-14" >@lang('reset.sign_up')</x-button>
        </form>
    </div>
@endsection
