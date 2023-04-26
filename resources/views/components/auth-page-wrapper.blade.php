@extends('layout')

@section('content')
    <div class="w-screen h-screen flex justify-between">
        <div class="md:pt-10 xs:w-screen xs:pt-6 xs:px-4 md:pl-28 md:w-[836px] min-h-screen">
            <a class="block w-44" href="/">
                <img class="w-44 h-11" src="assets/logo.svg" alt="logo">
            </a>
            <x-language-switch class="xs:right-5 xs:top-6 md:left-[45%] md:top-10" />
            {{ $slot }}
        </div>
        <img class="right w-[604px] h-full hidden md:block" src="assets/covid-19.png" alt="">
    </div>
@endsection
