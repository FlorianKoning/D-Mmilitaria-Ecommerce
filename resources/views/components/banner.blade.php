    <div class="relative isolate px-6 py-16 sm:py-16 lg:px-8 bg-[#687979] shadow">
        {{-- <img src="https://i.pinimg.com/originals/db/21/43/db2143142ab64643671cba3322f43bfd.jpg" alt="" class="absolute inset-0 -z-10 size-full object-cover"> --}}
        <div class="h-full w-full flex flex-col lg:flex-row justify-center mx-auto max-w-4xl text-center gap-8">
            <img class="size-40 mx-auto" src="{{ $business->business_logo }}" alt="Application logo" srcset="">
            <h2 class="text-5xl font-playfair font-semibold tracking-tight text-white sm:text-[100px] my-auto">{{ env('APP_NAME') }}</h2>
            {{-- <p class="mt-8 text-pretty text-lg font-medium text-gray-100 sm:text-xl/8">Voor het laatst geupdate: </p> --}}
        </div>
    </div>
</div>
