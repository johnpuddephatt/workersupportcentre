@props(['href', 'title', 'subtitle', 'size', 'extension'])
@if (isset($href))
    <a target="_blank" href="{{ $href }}"
        class="group flex max-w-4xl flex-row items-center gap-2 rounded bg-white p-4 lg:p-8 relative">
        <div class="absolute -top-3 -bottom-3 w-px bg-black left-0"></div>

        <div>
            <h3 class="type-xl ">{{ $title ?? $href }}</h3>
            @if ($subtitle)
                <p class="mt-2 max-w-xl">{{ $subtitle }}</p>
            @endif

        </div>
        <div class="ml-auto flex-none rounded-full bg-teal/80 p-4 transition group-hover:bg-teal/100">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="1.5"
                class="ml-auto h-10 w-10 text-white" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
            </svg>

        </div>

    </a>
@endif
