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
                            <input 
                                class="w-full h-14 pl-6 py-4 border border-[#E6E6E7] rounded-lg my-2 mb-4" 
                                id="password" name="password" type="password" placeholder="@lang('reset.password_placeholder')">
                            @error('password')
                                <p class="text-red-500 text-xs">
                                    {{$message}}
                                </p>
                            @enderror
                            <label class="text-[#010414] font-bold text-base" for="confirm_password">
                                @lang('reset.confirm_password')
                            </label>
                            <input 
                            class="w-full h-14 pl-6 py-4 border border-[#E6E6E7] rounded-lg my-2" id="confirm_password" name="confirm_password" type="password" placeholder="@lang('reset.confirm_placeholder')">
                            @error('confirm_password')
                                <p class="text-red-500 text-xs">
                                    {{$message}}
                                </p>
                            @enderror
                    </div>
                    <x-button class="md:mt-14" >@lang('reset.save')</x-button>
            </form>
</div>
@endsection