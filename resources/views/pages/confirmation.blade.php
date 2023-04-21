@extends('layout')

@section('content')
<div class="w-screen h-screen flex flex-col xs:p-4 md:p-10">
    <x-language-switch class="md:left-10" />
    <img class="xs:w-32 md:w-44 md:mx-auto" src="/assets/logo.svg" alt="">
    <div class="m-auto w-11/12 flex flex-col justify-center items-center">
        <img class="w-14 h-14"  src="/assets/icon.gif" alt="icon">
        <h1 class="mt-4 text-lg font-normal text-center">@lang('verification.email_sent')</h1>
    </div>
</div>
@endsection