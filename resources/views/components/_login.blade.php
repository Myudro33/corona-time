<form class="xs:w-full md:w-[392px] flex flex-col mt-6" action="{{{ route('login') }}}" method="post">
    @csrf
    <label for="username" class="text-[#010414] font-bold text-base">
        @lang('login.username')
    </label>
    <div class="relative" >
        <input class="w-full  h-14 pl-6 py-4 border rounded-lg my-1
        focus:outline-[#2029F3] focus:shadow-bd {{!$errors->any() ? "border-[#E6E6E7]" : ($errors->has('username') ? "border-error" : "border-success")}}" type="text" name="username"
        id="username" placeholder="@lang('login.username_placeholder')">
        {!! !$errors->any() ? "" : ($errors->has('username') ? "" : "<img class='absolute w-5 right-3 bottom-5' src='/assets/success.png' />")!!}
    </div>
    <x-error name="username" />
    {{-- @error('username')
    <div class="flex items-center">
        <img class="w-5 mx-1" src="/assets/error.png" alt="">  
        <p class="text-red-500 text-xs">{{ $message }}</p>
    </div>
    @enderror --}}
    <label for="password" class="text-[#010414] font-bold text-base mt-6">
        @lang('login.password')
    </label>
    <div class="relative">
        <input class="w-full h-14 pl-6 py-4 border rounded-lg my-1 focus:outline-[#2029F3] focus:shadow-bd {{!$errors->any() ? "border-[#E6E6E7]" : ($errors->has('password') ? "border-error" : "border-success")}} " type="password" name="password"
        id="password" placeholder="@lang('login.password_placeholder')">
        {!! !$errors->any() ? "" : ($errors->has('password') ? "" : "<img class='absolute w-5 right-3 bottom-5' src='/assets/success.png' />")!!}
    </div>
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
