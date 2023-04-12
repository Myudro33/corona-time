@extends('layout')

@section('content')
    <div class="w-screen h-screen flex justify-between">
        <div class="md:pt-10 xs:w-screen xs:py-6 xs:px-4 xs:h-[125vh] md:pl-28 md:w-[836px] md:h-screen">
            <img class="w-44 h-11" src="assets/logo.png" alt="">
            <h1 class="text-[#010414] font-black xs:text-xl md:text-2xl mt-14">Welcome to Coronatime</h1>
            <h1 class="text-[#808189] font-normal xs:text-base md:text-xl mt-4">Please enter required info to sign up</h1>
        <x-_register/>
        </div>
        <img class="right w-[604px] h-full hidden md:block" src="assets/covid-19.png" alt="">
    </div>
@endsection
