<div id="hero-carousel" class="relative w-full" data-carousel="slide">
    <div class="relative h-56 overflow-hidden md:h-[40rem]">
        {{ $slot }}
    </div>
    <button type="button"
        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4
            cursor-pointer group focus:outline-none"
        data-carousel-prev>
        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/10
                group-hover:bg-white/20 group-focus:ring-1 group-focus:ring-white transition-all duration-200 ease-in">
            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                </path>
            </svg>
        </span>
    </button>
    <button type="button"
        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4
            cursor-pointer group focus:outline-none"
        data-carousel-next>
        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/10
                group-hover:bg-white/20 group-focus:ring-1 group-focus:ring-white transition-all duration-200 ease-in">
            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </span>
    </button>
</div>
