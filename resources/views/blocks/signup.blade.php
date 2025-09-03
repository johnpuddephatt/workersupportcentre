<div class=" lg:my-24 wp-block {{ $block->classes }} bg-mint
{{ $block->block->align !== 'full' ? 'md:px-12' : '' }} overflow-hidden  relative py-12 md:py-16 not-prose"
    style="{{ $block->inlineStyle }}">

    <div
        class=" lg:px-0 container w-content !mx-0 lg:!mx-auto  relative flex flex-col lg:items-center-safe gap-8 md:flex-row">

        <div class="flex-grow">
            <h2 class="type-2xl type-underlined leading-tight decoration-black mb-6  md:mb-8">
                {{ $heading }}</h2>
            <div class=" ">{!! $content !!}</div>
            @if ($buttons)
                <div class="mt-6 flex flex-col gap-2 ">
                    @foreach ($buttons as $button)
                        @if (is_array($button['link']))
                            <x-button :color="$block->style == 'alternative' ? 'lime' : 'white'" :label="$button['link']['title']" :url="$button['link']['url']" :target="$button['link']['target']" />
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
        @if ($image)
            <div class="w-40 md:72 lg:w-80 relative flex-none">
                {!! wp_get_attachment_image($image, 'square', false, [
                    'sizes' => ' (min-width: 1200px) 40vw, (min-width: 800px) 55vw, 75vw',
                    'class' => 'h-auto rounded-full aspect-square object-cover w-full',
                ]) !!}

                @if ($badge)
                    <div
                        class="absolute -right-12 lg:-right-4 text-black size-28 bg-white  p-3  -top-4 text-center  font-black rounded-full  leading-tight flex items-center justify-center type-sm ">
                        {{ $badge }}
                    </div>
                @endif
            </div>
        @endif
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" class="absolute bottom-0 right-2/3 w-2/3 h-auto pointer-events-none"
        viewBox="0 0 288.24 111.46">
        <path fill="none" stroke="#eff2e2" stroke-miterlimit="10" stroke-width=".18"
            d="M.08 38.04S13.59 3.34 47.79.25c62.44-5.66 69.27 145.29 133.45 94.98 60.5-47.43 106.93 16.19 106.93 16.19" />
    </svg>

</div>
