@props(['sortby','title'])
@php
    $nextOrder = request('order') === 'asc' ? 'desc' : 'asc';
@endphp

<div class="flex items-center">
    <a
        href="?sort={{$sortby}}&order={{ request('sort') == "$sortby" ? $nextOrder : 'asc' }}&{{ http_build_query(request()->except('sort', 'order')) }}">
        @lang("dashboard.$title")
    </a>
    <x-sort-icons sortby="{{$sortby}}"/>
</div>