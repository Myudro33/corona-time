<div class="w-full h-20 flex md:px-28 xs:px-4 items-center justify-between shadow-md">
    <img class="xs:w-32 xs:h-8 md:w-44 md:h-11" src="assets/logo.svg" alt="">
    <div class="w-96 h-10 relative flex justify-end">
        <x-language-switch class="md:left-0 md:top-0 xs:top-0 xs:left-5" />
        <div class="md:flex items-center xs:hidden">
            <h1 class="text-[#010414] font-bold">{{ Auth::user()->username }}</h1>
            <hr class="border border-[#E6E6E7] h-8 mx-4">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class="text-[#010414] font-medium" type="submit">Log Out</button>
            </form>
        </div>
    </div>
    <div class="md:hidden xs:flex" @click.away="show = false" x-data="{ show: false }">
        <button class="flex items-center" @click="show = !show"><img class="mx-1" src="/assets/Vector.svg">
        </button>
        <div class="z-10 bg-white absolute left-0 top-0 w-full h-20 p-3 flex justify-between items-center"
            style="display: none" x-show="show">
            <h1 class="text-[#010414] font-bold">{{ Auth::user()->username }}</h1>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class="text-[#010414] font-medium" type="submit">Log Out</button>
            </form>
            <button class="flex items-center" @click="show = !show"><img class="w-4" src="/assets/Vector.svg">
            </button>
        </div>
    </div>
</div>
