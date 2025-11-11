@props(['href', 'title', 'subtitle', 'size', 'extension'])
@if (isset($href))

    <a target="_blank" href="{{ $href }}" rel="noopener noreferrer" download
        class="group flex max-w-4xl flex-row items-center gap-2 rounded bg-white p-4 lg:p-8 relative">
        <div class="absolute -top-3 -bottom-3 w-px bg-black left-0"></div>

        <div>
            <div class="">
                <h3 class="inline type-xl">
                    {{ $title }}</h3>
                <div class="mt-2 inline-flex flex-row items-center gap-1 rounded  bg-opacity-20 px-3  type-xs uppercase">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="-mt-1 h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                    </svg>
                    @if ($extension)
                        <div class="">{{ $extension }}</div>
                    @endif
                    @if ($size)
                        ({{ max(number_format($size / 1000000, 1), 0.1) }}MB)
                    @endif
                </div>
            </div>

            <p class="mt-2  max-w-xl">{{ $subtitle }}</p>

        </div>

        <div class="ml-auto flex-none rounded-full bg-teal/80 p-4 transition group-hover:bg-teal/100">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="1.5"
                class="ml-auto h-10 w-10 text-beige" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m9 13.5 3 3m0 0 3-3m-3 3v-6m1.06-4.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44z" />
            </svg>

        </div>
    </a>
@endif
