<div class=" flex flex-col sm:justify-center items-center sm:pt-0">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full bg-gray-100 sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg" style="z-index:10">
        {{ $slot }}
    </div>
    
    <div>
        {{ $carbg }}
    </div>
</div>
