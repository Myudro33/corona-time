<form class="xs:w-full md:w-[392px] flex flex-col mt-6" action="#" method="post">
    <label for="username" class="text-[#010414] font-bold text-base">
        @lang('login.username')
    </label>
    <input class="w-full h-14 pl-6 py-4 border border-[#E6E6E7] rounded-lg my-1" type="text" name="username"
        id="username" placeholder="@lang('login.username_placeholder')">
    <label for="password" class="text-[#010414] font-bold text-base mt-6">
        @lang('login.password')
    </label>
    <input class="w-full h-14 pl-6 py-4 border border-[#E6E6E7] rounded-lg my-1" type="password" name="password"
        id="password" placeholder="@lang('login.password_placeholder')">
    <div class="w-full flex justify-between items-center mt-6">
        <label for="checkbox" class="flex items-center text-[#010414] text-sm font-semibold">
            <input class="w-5 h-5 m-1 xs:text-sm md:text-base" type="checkbox" name="remember" id="remember">
            @lang('login.remember_device')
        </label>
        <a class="text-[#2029F3] text-sm font-semibold" href="/forgot-password">@lang('login.forgot_password')</a>
    </div>
    <button type="submit"
        class="bg-[#0FBA68] w-full h-14 text-white font-black text-base rounded-lg my-6">@lang('login.log_in')</button>
    <div class="w-full flex justify-center">
        <span class="text-[#808189] font-normal">@lang('login.dont_have_account')<a
                class="text-[#010414] xs:text-sm md:text-base font-bold ml-1"
                href="/register">@lang('login.sign_up')</a></span>
    </div>
</form>
