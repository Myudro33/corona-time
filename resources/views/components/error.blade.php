@props(['name'])

@error($name)
<div class="flex items-center">
    <img class="w-5 mx-1" src="/assets/error.png" alt="">  
    <p class="text-red-500 text-xs">{{ $message }}</p>
</div>
@enderror