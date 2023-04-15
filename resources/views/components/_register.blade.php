<form class="xs:w-full xs:h-[90vh] md:h-auto md:w-[392px] flex flex-col my-6" action="{{{ route('register') }}}" method="post">
    @csrf
    <label for="username" class="text-[#010414] font-bold text-base">
        @lang('register.username')
    </label>
    <input class="w-full h-14 pl-6 py-4 border border-[#E6E6E7] rounded-lg my-1" type="text" name="username"
        id="username" placeholder="@lang('register.username_placeholder')">
    @error('username')
        <p class="text-red-500 text-xs" >{{$message}}</p>
    @enderror
        <p class="text-[#808189] text-sm font-normal">@lang('register.username_requirement')</p>
    <label for="email" class="text-[#010414] font-bold text-base mt-6">
        @lang('register.email')
    </label>
    <input class="w-full h-14 pl-6 py-4 border border-[#E6E6E7] rounded-lg my-1" type="text" name="email"
        id="email" placeholder="@lang('register.email_placeholder')">
        @error('email')
        <p class="text-red-500 text-xs" >{{$message}}</p>
    @enderror
        <label for="password" class="text-[#010414] font-bold text-base mt-6">
        @lang('register.password')
    </label>
    <input class="w-full h-14 pl-6 py-4 border border-[#E6E6E7] rounded-lg my-1" type="password" name="password"
        id="password" placeholder="@lang('register.password_placeholder')">
        @error('password')
        <p class="text-red-500 text-xs" >{{$message}}</p>
    @enderror
        <label for="confirm_password" class="text-[#010414] font-bold text-base mt-6">
        @lang('register.confirm_password')
    </label>
    <input class="w-full h-14 pl-6 py-4 border border-[#E6E6E7] rounded-lg my-1" type="password" name="confirm_password"
        id="confirm_password" placeholder="@lang('register.confirm_password_placeholder')">
        @error('confirm_password')
        <p class="text-red-500 text-xs" >{{$message}}</p>
    @enderror
        <x-button class="md:mt-6 my-6" >@lang('register.sign_up')</x-button>
    <div class="w-full flex justify-center">
        <span class="text-[#808189] font-normal">@lang('register.already_have_account')<a
                class="text-[#010414] xs:text-sm md:text-base font-bold ml-1"
                href="/login">@lang('register.log_in')</a></span>
    </div>
</form>
