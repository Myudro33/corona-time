<form class="xs:w-full md:w-[392px] flex flex-col mt-6" action="#" method="post">
    <label for="username" class="text-[#010414] font-bold text-base">
        @lang('register.username')
    </label>
    <input class="w-full h-14 pl-6 py-4 border border-[#E6E6E7] rounded-lg my-1" type="text" name="username"
        id="username" placeholder="@lang('register.username_placeholder')">
    <p class="text-[#808189] text-sm font-normal">@lang('register.username_requirement')</p>
    <label for="email" class="text-[#010414] font-bold text-base mt-6">
        @lang('register.email')
    </label>
    <input class="w-full h-14 pl-6 py-4 border border-[#E6E6E7] rounded-lg my-1" type="email" name="email"
        id="email" placeholder="@lang('register.email_placeholder')">
    <label for="password" class="text-[#010414] font-bold text-base mt-6">
        @lang('register.password')
    </label>
    <input class="w-full h-14 pl-6 py-4 border border-[#E6E6E7] rounded-lg my-1" type="password" name="password"
        id="password" placeholder="@lang('register.password_placeholder')">
    <label for="repeat-password" class="text-[#010414] font-bold text-base mt-6">
        @lang('register.repeat_password')
    </label>
    <input class="w-full h-14 pl-6 py-4 border border-[#E6E6E7] rounded-lg my-1" type="password" name="repeat-password"
        id="repeat-password" placeholder="@lang('register.repeat_password_placeholder')">
    <button type="submit"
        class="bg-[#0FBA68] w-full h-14 text-white font-black text-base rounded-lg my-6">@lang('register.sign_up')</button>
    <div class="w-full flex justify-center">
        <span class="text-[#808189] font-normal">@lang('register.already_have_account')<a
                class="text-[#010414] xs:text-sm md:text-base font-bold ml-1"
                href="/login">@lang('register.log_in')</a></span>
    </div>
</form>
