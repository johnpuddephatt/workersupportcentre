<div class="my-16 wp-block {{ $block->classes }} {{ $block->style == 'alternative' ? 'bg-lime' : 'bg-mint' }}
{{ $block->block->align !== 'full' ? 'md:px-12' : '' }} overflow-hidden  relative py-12 not-prose"
    style="{{ $block->inlineStyle }}">

    <div class="absolute top-0 h-1/2 w-6 {{ $block->style == 'alternative' ? 'bg-mint' : 'bg-lime' }} left-0"></div>
    <div class="absolute top-1/2 h-1/2  w-6 bg-teal left-0"></div>

    <div class=" w-full !mx-0 lg:!mx-auto  relative flex flex-col items-center-safe gap-8 ">

        {{-- @if ($image)
            <div
                class="{{ $block->style == 'alternative' ? 'w-40 md:72 lg:w-80' : 'w-40 md:w-56 lg:w-64' }} relative flex-none">
                {!! wp_get_attachment_image($image, 'square', false, [
                    'sizes' => ' (min-width: 1200px) 40vw, (min-width: 800px) 55vw, 75vw',
                    'class' => 'h-auto rounded-full aspect-square object-cover w-full',
                ]) !!}

            </div>
        @endif --}}

        <div class="w-full">
            <h2 class="type-xl  mb-6  md:mb-8">
                “{{ $heading }}”</h2>
            <div class="max-w-xl ">{!! $content !!}</div>
            @if ($buttons)
                <div class="mt-6 flex flex-col gap-2 ">
                    @foreach ($buttons as $button)
                        @if (is_array($button['link']))
                            <x-button :color="$block->style == 'alternative' ? 'white' : 'lime'" :label="$button['link']['title']" :url="$button['link']['url']" :target="$button['link']['target']" />
                        @endif
                    @endforeach
                </div>
            @endif
        </div>

    </div>

    <svg xmlns="http://www.w3.org/2000/svg"
        class="absolute -bottom-8 -right-2 origin-center -rotate-45 w-2/3 h-auto pointer-events-none"
        viewBox="0 0 288.24 111.46">
        <path fill="none" stroke="#555" stroke-miterlimit="10" stroke-width=".18"
            d="M.08 38.04S13.59 3.34 47.79.25c62.44-5.66 69.27 145.29 133.45 94.98 60.5-47.43 106.93 16.19 106.93 16.19" />
    </svg>
</div>
