<form class="xs:w-full md:w-[392px] flex flex-col mt-6" action="#" method="post">
    <label for="username" class="text-[#010414] font-bold text-base">
        Username
    </label>
    <input class="w-full h-14 pl-6 py-4 border border-[#E6E6E7] rounded-lg my-1" type="text" name="username"
        id="username" placeholder="Enter unique username or email">
    <label for="password" class="text-[#010414] font-bold text-base mt-6">
        Password
    </label>
    <input class="w-full h-14 pl-6 py-4 border border-[#E6E6E7] rounded-lg my-1" type="password" name="password"
        id="password" placeholder="Fill in password">
    <div class="w-full flex justify-between items-center mt-6">
        <label for="checkbox" class="flex items-center text-[#010414] text-sm font-semibold">
            <input class="w-5 h-5 m-1 xs:text-sm md:text-base" type="checkbox" name="remember" id="remember">
            Remember this device
        </label>
        <a class="text-[#2029F3] text-sm font-semibold" href="/forgot-password">Forgot password?</a>
    </div>
    <button type="submit" class="bg-[#0FBA68] w-full h-14 text-white font-black text-base rounded-lg my-6">LOG
        IN</button>
    <div class="w-full flex justify-center">
        <span class="text-[#808189] font-normal">Don't have an account? <a
                class="text-[#010414] xs:text-sm md:text-base font-bold" href="/register">Sign up for free</a></span>
    </div>
</form>
