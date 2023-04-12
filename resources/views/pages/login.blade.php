@extends('layout')

@section('content')
    <div class="w-screen h-screen flex justify-between">
        <div class="md:pt-10 xs:w-screen xs:pt-6 xs:px-4 md:pl-28 md:w-[836px] h-full">
            <img class="w-44 h-11" src="assets/logo.png" alt="">
            <h1 class="text-[#010414] font-black xs:text-xl md:text-2xl mt-14">Welcome Back</h1>
            <h1 class="text-[#808189] font-normal xs:text-base md:text-xl mt-4">Welcome back! Please enter your details</h1>
        <x-_login/>
        </div>
        <img class="right w-[604px] h-full hidden md:block" src="assets/covid-19.png" alt="">
    </div>
@endsection
