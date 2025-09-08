<header class="">
    <div class="container pt-6 pb-5 flex justify-center lg:justify-between bg-mint/50 max-w-none">
        <div class="flex  gap-2 font-semibold items-center">
            @if (get_field('header_text', 'options'))
                <div class=" bg-teal text-white rounded-full p-1 -mt-1">
                    @svg('phone', 'w-6 h-6')</div>

                {!! str_replace(
                    '[tel]',
                    "<a class=\"font-bold\"  href=\"tel:" .
                        get_field('company_phone', 'options') .
                        "\">" .
                        get_field('company_phone', 'options') .
                        '</a>',
                
                    get_field('header_text', 'options'),
                ) !!}
            @endif
        </div>
        @if ($secondary_navigation)
            <nav class="hidden lg:block order-10 lg:order-none">
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
    </div>

    <div class="py-6 lg:py-12 container flex items-end max-w-none  ">
        <a label="Go to homepage"
            class="flex flex-row items-center gap-1.5 text-2xl font-bold tracking-tight lg:text-3xl"
            href="{{ home_url('/') }}">
            <x-logo class="w-44 md:w-52 xl:w-64 2xl:w-[17rem]" />

        </a>

        <div class="ml-auto flex-col gap-1 lg:hidden flex items-end justify-end">
            <x-translate />

            <button @click="menuOpen = true" :class="{ 'hidden': menuOpen }"
                class="inline-block border px-4 pt-1.5 pb-1 font-semibold !no-underline transition"
                aria-label="Open navigation menu" title="Open navigation menu">Menu
            </button>
        </div>

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

                <x-logo class="lg:hidden w-48 mb-8 h-auto " :invert="true" />

                <nav>
                    <ul class="flex flex-col lg:justify-end gap-4 lg:flex-row lg:gap-12">
                        @foreach ($primary_navigation as $item)
                            <li>
                                <a class=" inline-block md:text-xl font-semibold text-2xl {{ $item->active ? 'type-underlined !decoration-orange' : '' }}"
                                    href="{{ $item->url }}">{!! $item->label !!}</a>

                            </li>
                        @endforeach
                    </ul>
                </nav>

                @if ($secondary_navigation)
                    <nav class="lg:hidden order-10 lg:order-none">
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

            </div>
        @endif
    </div>
</header>
