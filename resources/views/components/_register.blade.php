<form class="xs:w-full xs:h-[90vh] md:h-auto md:w-[392px] flex flex-col my-6" action="{{{ route('register') }}}" method="post">
    @csrf
    <label for="username" class="text-[#010414] font-bold text-base">
        @lang('register.username')
    </label>
    <div class="relative">
        <input class="w-full h-14 pl-6 py-4 border rounded-lg my-1 focus:outline-[#2029F3] focus:shadow-bd {{!$errors->any() ? "border-[#E6E6E7]" : ($errors->has('username') ? "border-error" : "border-success")}}" type="text" name="username"
        id="username" placeholder="@lang('register.username_placeholder')">
        {!! !$errors->any() ? "" : ($errors->has('username') ? "" : "<img class='absolute w-5 right-3 bottom-5' src='/assets/success.png' />")!!}
    </div>
    @error('username')
    <div class="flex items-center">
        <img class="w-5 mx-1" src="/assets/error.png" alt="">  
        <p class="text-red-500 text-xs">{{ $message }}</p>
    </div>
    @enderror
        <p class="text-[#808189] text-sm font-normal">@lang('register.username_requirement')</p>
    <label for="email" class="text-[#010414] font-bold text-base mt-6">
        @lang('register.email')
    </label>
    <div class="relative">
        <input class="w-full h-14 pl-6 py-4 border rounded-lg my-1 focus:outline-[#2029F3] focus:shadow-bd {{!$errors->any() ? "border-[#E6E6E7]" : ($errors->has('email') ? "border-error" : "border-success")}}" type="text" name="email"
        id="email" placeholder="@lang('register.email_placeholder')">
        {!! !$errors->any() ? "" : ($errors->has('email') ? "" : "<img class='absolute w-5 right-3 bottom-5' src='/assets/success.png' />")!!}
    </div>
        @error('email')
        <div class="flex items-center">
            <img class="w-5 mx-1" src="/assets/error.png" alt="">  
            <p class="text-red-500 text-xs">{{ $message }}</p>
        </div>
    @enderror
        <label for="password" class="text-[#010414] font-bold text-base mt-6">
        @lang('register.password')
    </label>
    <div class="relative">
        <input class="w-full h-14 pl-6 py-4 border rounded-lg my-1 focus:outline-[#2029F3] focus:shadow-bd {{!$errors->any() ? "border-[#E6E6E7]" : ($errors->has('password') ? "border-error" : "border-success")}}" type="password" name="password"
        id="password" placeholder="@lang('register.password_placeholder')">
        {!! !$errors->any() ? "" : ($errors->has('password') ? "" : "<img class='absolute w-5 right-3 bottom-5' src='/assets/success.png' />")!!}
    </div>
        @error('password')
        <div class="flex items-center">
            <img class="w-5 mx-1" src="/assets/error.png" alt="">  
            <p class="text-red-500 text-xs">{{ $message }}</p>
        </div>
    @enderror
        <label for="confirm_password" class="text-[#010414] font-bold text-base mt-6">
        @lang('register.confirm_password')
    </label>
    <div class="relative">
        <input class="w-full h-14 pl-6 py-4 border rounded-lg my-1 focus:outline-[#2029F3] focus:shadow-bd {{!$errors->any() ? "border-[#E6E6E7]" : ($errors->has('confirm_password') ? "border-error" : "border-success")}}" type="password" name="confirm_password"
        id="confirm_password" placeholder="@lang('register.confirm_password_placeholder')">
        {!! !$errors->any() ? "" : ($errors->has('confirm_password') ? "" : "<img class='absolute w-5 right-3 bottom-5' src='/assets/success.png' />")!!}
    </div>
        @error('confirm_password')
        <div class="flex items-center">
            <img class="w-5 mx-1" src="/assets/error.png" alt="">  
            <p class="text-red-500 text-xs">{{ $message }}</p>
        </div>
    @enderror
        <x-button class="md:mt-6 my-6" >@lang('register.sign_up')</x-button>
    <div class="w-full flex justify-center">
        <span class="text-[#808189] font-normal">@lang('register.already_have_account')<a
                class="text-[#010414] xs:text-sm md:text-base font-bold ml-1"
                href="/login">@lang('register.log_in')</a></span>
    </div>
</form>
