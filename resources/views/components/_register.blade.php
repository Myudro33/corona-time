<form class="xs:w-full md:w-[392px] flex flex-col mt-6" action="#" method="post">
    <label for="username" class="text-[#010414] font-bold text-base">
        Username
    </label>
    <input class="w-full h-14 pl-6 py-4 border border-[#E6E6E7] rounded-lg my-1" type="text" name="username"
        id="username" placeholder="Enter unique username">
    <p class="text-[#808189] text-sm font-normal">Username should be unique, min 3 symbols</p>
    <label for="email" class="text-[#010414] font-bold text-base mt-6">
        Email
    </label>
    <input class="w-full h-14 pl-6 py-4 border border-[#E6E6E7] rounded-lg my-1" type="email" name="email"
        id="email" placeholder="Enter your email">
    <label for="password" class="text-[#010414] font-bold text-base mt-6">
        Password
    </label>
    <input class="w-full h-14 pl-6 py-4 border border-[#E6E6E7] rounded-lg my-1" type="password" name="password"
        id="password" placeholder="Fill in password">
    <label for="repeat-password" class="text-[#010414] font-bold text-base mt-6">
        Repeat password
    </label>
    <input class="w-full h-14 pl-6 py-4 border border-[#E6E6E7] rounded-lg my-1" type="password"
        name="repeat-password" id="repeat-password" placeholder="Repeat password">
    <button type="submit" class="bg-[#0FBA68] w-full h-14 text-white font-black text-base rounded-lg my-6">SIGN
        UP</button>
    <div class="w-full flex justify-center">
        <span class="text-[#808189] font-normal">Already have an account? <a
                class="text-[#010414] xs:text-sm md:text-base font-bold" href="/login">Log in</a></span>
    </div>
</form>
