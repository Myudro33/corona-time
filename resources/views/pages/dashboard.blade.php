@extends('layout')

@section('content')

  @auth
      <h1>{{Auth::user()->username}}</h1>
      <form action="{{{route('logout')}}}" method="post">
        @csrf
            <button type="submit" >logout</button>
        </form>
  @endauth
@endsection