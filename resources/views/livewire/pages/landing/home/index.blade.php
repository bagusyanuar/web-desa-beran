<div class="w-full">
    <x-container.landing-container class="h-[500px] ">
        <div class="w-full h-full flex gap-3 py-6">
            <div class="w-1/2 h-full flex flex-col justify-center">
                <h1 class="text-brand-500 text-[2rem]">
                    Platform Digital Desa Beran
                </h1>
                <p class="text-neutral-500 text-md mb-7">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book.
                </p>
                <button class="bg-accent-500 py-3 px-6 rounded-xl w-fit">
                    <span class="text-white">
                        Get Started
                    </span>
                </button>
            </div>
            <div class="w-1/2 h-full flex flex-col gap-3">
                <div class="flex-1 w-full">
                    <div class="w-full h-full bg-red-500">
                        <img src="{{ asset('static/images/slide-1.jpg') }}" class="object-cover object-center" style="height: inherit" />
                    </div>
                    {{--  --}}
                </div>
                <div class="flex-1 w-full flex items-center gap-3">
                    <div class="w-full h-full bg-red-500">
                    </div>
                    <div class="w-full h-full bg-red-500">
                    </div>
                    {{-- <img src="{{ asset('static/images/slide-1.jpg') }}" class="rounded-md object-cover" /> --}}
                    {{-- <img src="{{ asset('static/images/slide-1.jpg') }}" class="rounded-md w-1/2 object-cover" /> --}}
                </div>
            </div>
        </div>
    </x-container.landing-container>
</div>
