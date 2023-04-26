@props(['sortby'])
<div class="mx-2 md:block xs:hidden shrink-0">
    <img class="w-3 my-1" src="/assets/arrow-up-{{request('sort')==$sortby&&request('order')=='asc'?'asc':'desc'}}.svg" alt="">
    <img class="w-3 my-1" src="/assets/arrow-down-{{request('sort')==$sortby&&request('order')=='desc'?'desc':'asc'}}.svg" alt="">
</div>