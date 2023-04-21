<form class="xs:w-full md:w-[392px] flex flex-col mt-6" action="{{{ route('login') }}}" method="post">
    @csrf
    <label for="username" class="text-[#010414] font-bold text-base">
        @lang('login.username')
    </label>
    <x-input type='text' name='username' placeholder="{{__('login.username_placeholder')}}" />
    <x-error name="username" />
    <label for="password" class="text-[#010414] font-bold text-base mt-6">
        @lang('login.password')
    </label>
    <x-input type='password' name='password' placeholder="{{__('login.password_placeholder')}}" />
    <x-error name="password" />
    <div class="w-full flex justify-between items-center mt-6">
        <label for="checkbox" class="flex items-center text-[#010414] text-sm font-semibold">
            <input class="w-5 h-5 m-1 xs:text-sm md:text-base accent-[#249E2C]" type="checkbox" name="remember"
                id="remember">
            @lang('login.remember_device')
        </label>
        <a class="text-[#2029F3] text-sm font-semibold" href="/forgot-password">@lang('login.forgot_password')</a>
    </div>
    <x-button class="md:mt-6 my-6">@lang('login.log_in')</x-button>
    <div class="w-full flex justify-center">
        <span class="text-[#808189] font-normal">@lang('login.dont_have_account')<a
                class="text-[#010414] xs:text-sm md:text-base font-bold ml-1"
                href="/register">@lang('login.sign_up')</a></span>
    </div>
</form>
