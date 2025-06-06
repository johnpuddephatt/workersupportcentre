<header class="">

    <div class="py-12 container flex max-w-none  ">
        <a label="Go to homepage" class="flex flex-row items-center gap-1.5 text-2xl font-bold tracking-tight lg:text-3xl"
            href="{{ home_url('/') }}">
            <x-logo class="w-40 lg:w-52 2xl:w-64" />

        </a>

        <button @click="menuOpen = true" :class="{ 'hidden': menuOpen }"
            class="ml-auto inline-block rounded-small border-2 border-blue-bright px-6 py-2 font-semibold !no-underline transition duration-300 hover:bg-green hover:bg-opacity-20 lg:hidden"
            aria-label="Open navigation menu" title="Open navigation menu">Menu
        </button>

        @if ($primary_navigation)

            <div x-cloak :class="{ 'max-lg:translate-x-full': !menuOpen }"
                class="p-8 lg:p-0 flex-grow justify-center lg:justify-between flex  flex-col gap-8 bg-white  overflow-y-auto lg:overflow-visible transition max-lg:fixed max-lg:inset-0 max-lg:top-0 max-lg:z-20 max-lg:h-full max-lg:w-full  max-lg:py-36 ">

                <button @click="menuOpen = false" :class="{ 'hidden': !menuOpen }" class=""
                    aria-label="Close navigation menu" title="Close navigation menu"><svg
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor"
                        class="size-12 rounded-full bg-lime absolute top-6 right-6 bg-opacity-75 p-2 transition hover:bg-opacity-100 hover:text-black">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <x-logo class="lg:hidden max-w-xs " :invert="true" />

                @if ($secondary_navigation)
                    <nav class="order-10 lg:order-none">
                        <ul class="flex flex-col justify-end text-2xl lg:flex-row lg:text-base gap-2 lg:gap-8 ">
                            @foreach ($secondary_navigation as $item)
                                <li>
                                    <a class="inline-block" href="{{ $item->url }}">{!! $item->label !!}</a>
                                </li>
                            @endforeach

                            <x-translate />
                        </ul>
                    </nav>
                @endif

                <nav>
                    <ul class="flex flex-col lg:justify-end gap-4 lg:flex-row lg:gap-12">
                        @foreach ($primary_navigation as $item)
                            <li>
                                <a class=" inline-block md:text-xl font-semibold text-2xl"
                                    href="{{ $item->url }}">{!! $item->label !!}</a>
                            </li>
                        @endforeach
                    </ul>
                </nav>

            </div>
        @endif
    </div>
</header>
