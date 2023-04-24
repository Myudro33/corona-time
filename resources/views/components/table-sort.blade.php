@props(['column','order','sortby','nextOrder','title'])

<div class="flex items-center">
    <a
        href="?sort={{$sortby}}&order={{ $column == "$sortby" ? $nextOrder : 'asc' }}&{{ http_build_query(request()->except('sort', 'order')) }}">
        @lang("dashboard.$title")
    </a>
    <x-sort-icons column="{{ $column }}" sortby="{{$sortby}}" order="{{ $order }}" />
</div>