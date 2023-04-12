@extends('layout')

@section('content')
    <div class="w-screen h-screen flex justify-between">
        <div class="md:pt-10 xs:w-screen xs:pt-6 xs:px-4 md:pl-28 md:w-[836px] min-h-screen">
            <a href="/">
                <img class="w-44 h-11" src="assets/logo.png" alt="logo">
            </a>
            <x-language-switch />
            {{ $slot }}
        </div>
        <img class="right w-[604px] h-full hidden md:block" src="assets/covid-19.png" alt="">
    </div>
@endsection
