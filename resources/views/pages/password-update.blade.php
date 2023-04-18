@extends('layout')

@section('content')

<div class="flex flex-col md:items-center w-full h-screen xs:py-6 xs:px-4 md:py-14">
        <x-language-switch class="md:left-9" />
            <img class="w-44 h-11" src="/assets/logo.png" alt="logo">
                <form class="xs:h-screen xs:flex xs:flex-col xs:justify-between md:w-[392px] md:h-auto md:mt-36" action="{{{ route('password.store',$user->id) }}}"
                method="post">
                @csrf
                    <div>
                            <h1 class="text-[#010414] font-black xs:text-xl md:text-[25px] xs:my-10 md:my-14  text-center">
                            @lang('reset.heading')
                            </h1>
                            <label class="text-[#010414] font-bold text-base mt-6" for="password">
                                @lang('register.password')
                            </label>
                            <div class="relative">
                                <input class="w-full h-14 pl-6 py-4 border rounded-lg my-1 focus:outline-[#2029F3] focus:shadow-bd {{!$errors->any() ? "border-[#E6E6E7]" : ($errors->has('password') ? "border-error" : "border-success")}}" type="password" name="password"
                                id="password" placeholder="@lang('register.password_placeholder')">
                                {!! !$errors->any() ? "" : ($errors->has('password') ? "" : "<img class='absolute w-5 right-3 bottom-5' src='/assets/success.png' />")!!}
                            </div>
                            <x-error name="password" />
                            <label class="text-[#010414] font-bold text-base" for="confirm_password">
                                @lang('reset.confirm_password')
                            </label>
                            <div class="relative">
                                <input class="w-full h-14 pl-6 py-4 border rounded-lg my-1 focus:outline-[#2029F3] focus:shadow-bd {{!$errors->any() ? "border-[#E6E6E7]" : ($errors->has('confirm_password') ? "border-error" : "border-success")}}" type="password" name="confirm_password"
                                id="confirm_password" placeholder="@lang('register.confirm_password_placeholder')">
                                {!! !$errors->any() ? "" : ($errors->has('confirm_password') ? "" : "<img class='absolute w-5 right-3 bottom-5' src='/assets/success.png' />")!!}
                            </div>
                            <x-error name="confirm_password" />

                    </div>
                    <x-button class="md:mt-14" >@lang('reset.save')</x-button>
            </form>
</div>
@endsection