@extends('layout')

@section('content')
    <div class="flex flex-col md:items-center w-full h-screen xs:py-6 xs:px-4 md:py-14">
        <x-language-switch class="md:left-9" />
        <img class="w-44 h-11" src="/assets/logo.svg" alt="logo">
        <form class="xs:h-screen xs:flex xs:flex-col xs:justify-between md:w-[392px] md:h-auto md:mt-36"
            action="{{ route('password.reset', $token) }}" method="post">
            @csrf
            <div>
                <h1 class="text-[#010414] font-black xs:text-xl md:text-[25px] xs:my-10 md:my-14  text-center">
                    @lang('reset.heading')
                </h1>
                <label class="text-[#010414] font-bold text-base mt-6" for="password">
                    @lang('register.password')
                </label>
                <input type="text" hidden name="email" id="email" value="{{ $email }}">
                <input type="text" hidden name="token" id="token" value="{{ $token }}">
                <x-input type='password' name='password' placeholder="{{ __('register.password_placeholder') }}" />
                <x-error name="password" />
                <label class="text-[#010414] font-bold text-base" for="confirm_password">
                    @lang('reset.confirm_password')
                </label>
                <x-input type='password' name='confirm_password'
                    placeholder="{{ __('register.confirm_password_placeholder') }}" />
                <x-error name="confirm_password" />
            </div>
            <x-button class="md:mt-14">@lang('reset.save')</x-button>
        </form>
    </div>
@endsection
