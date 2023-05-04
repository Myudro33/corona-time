<form class="xs:w-full xs:h-[90vh] md:h-auto md:w-[392px] flex flex-col my-6" action="{{{ route('register') }}}" method="post">
    @csrf
    <label for="username" class="text-[#010414] font-bold text-base">
        @lang('register.username')
    </label>
    <x-input type='text' name='username' placeholder="{{__('register.username_placeholder')}}" />
    <x-error name="username" />
        <p class="text-[#808189] text-sm font-normal">@lang('register.username_requirement')</p>
    <label for="email" class="text-[#010414] font-bold text-base mt-6">
        @lang('register.email')
    </label>
    <x-input type='text' name='email' placeholder="{{__('register.email_placeholder')}}" />
    <x-error name="email" />
        <label for="password" class="text-[#010414] font-bold text-base mt-6">
        @lang('register.password')
    </label>
    <x-input type='password' name='password' placeholder="{{__('register.password_placeholder')}}" />
    <x-error name="password" />
        <label for="password_confirmation" class="text-[#010414] font-bold text-base mt-6">
        @lang('register.confirm_password')
    </label>
    <x-input id="password" type='password' name='password_confirmation' placeholder="{{__('register.confirm_password_placeholder')}}" />
    <x-error name="password_confirmation" />
        <x-button class="md:mt-6 my-6" >@lang('register.sign_up')</x-button>
    <div class="w-full flex justify-center">
        <span class="text-[#808189] font-normal">@lang('register.already_have_account')<a
                class="text-[#010414] xs:text-sm md:text-base font-bold ml-1"
                href="/login">@lang('register.log_in')</a></span>
    </div>
</form>
