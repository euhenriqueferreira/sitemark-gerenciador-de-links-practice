@props([
    'title'
])
<div class="flex items-center p-5 h-full">
    <div class="w-3/5 h-full">
        <img src="/storage/assets/thumbnail.png" alt="Background" class="w-full h-full object-contain">
    </div>

    <div class="w-2/5 px-20">
        <div class="w-full flex justify-center"><img src="/storage/assets/logo.png" alt="Logo" class="mb-24 w-[228px] object-scale-down"></div>

        <h1 class="text-xl font-bold text-white mb-8">{{ $title }}</h1>

        {{ $slot }}
    </div>
</div>