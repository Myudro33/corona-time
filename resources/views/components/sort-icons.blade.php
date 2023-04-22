@props(['column', 'order','sortby'])
<div class="mx-2 shrink-0">
    <img class="w-3 my-1" src="/assets/arrow-up-{{$column==$sortby&&$order=='asc'?'asc':'desc'}}.svg" alt="">
    <img class="w-3 my-1" src="/assets/arrow-down-{{$column==$sortby&&$order=='desc'?'desc':'asc'}}.svg" alt="">
</div>