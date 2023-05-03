@props(['sortby','title'])
@php
    $nextOrder = request('order') === 'asc' ? 'desc' : 'asc';
@endphp

<div class="flex items-center">
    <a class="flex items-center"
        href="?sort={{$sortby}}&order={{ request('sort') == "$sortby" ? $nextOrder : 'asc' }}&{{ http_build_query(request()->except('sort', 'order')) }}">
        @lang("dashboard.$title")
        <x-sort-icons sortby="{{$sortby}}"/>
    </a>
</div>