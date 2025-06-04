<div class="my-24 wp-block {{ $block->classes }} {{ $block->style == 'alternative' ? 'bg-teal text-beige' : 'bg-beige' }}
{{ $block->block->align !== 'full' ? 'md:px-12' : '' }} overflow-hidden  relative py-12 md:py-16 not-prose"
    style="{{ $block->inlineStyle }}">

    <div
        class="   w-content !mx-0 lg:!mx-auto  relative flex flex-col items-center-safe gap-8  {{ $block->style == 'alternative' ? 'md:flex-row-reverse' : 'md:flex-row' }}">

        @if ($image)
            <div
                class="{{ $block->style == 'alternative' ? 'w-40 md:72 lg:w-80' : 'w-40 md:w-56 lg:w-64' }} relative flex-none">
                {!! wp_get_attachment_image($image, 'square', false, [
                    'sizes' => ' (min-width: 1200px) 40vw, (min-width: 800px) 55vw, 75vw',
                    'class' => 'h-auto rounded-full aspect-square object-cover w-full',
                ]) !!}

                @if ($badge)
                    <div
                        class="absolute   {{ $block->style == 'alternative' ? 'bg-lime -right-4 text-black size-28' : '-left-4 bg-orange size-24' }} p-4  -top-4 text-center rounded-full  leading-tight flex items-center justify-center type-xs ">
                        {{ $badge }}
                    </div>
                @endif
            </div>
        @endif

        <div class="">
            <h2
                class="{{ $block->style == 'alternative' ? 'type-2xl type-underlined decoration-lime' : 'type-lg' }} mb-6  md:mb-8">
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

    </div>

    @if ($block->style == 'alternative')
        <svg xmlns="http://www.w3.org/2000/svg" class="absolute bottom-0 right-2/3 w-2/3 h-auto pointer-events-none"
            viewBox="0 0 288.24 111.46">
            <path fill="none" stroke="#eff2e2" stroke-miterlimit="10" stroke-width=".18"
                d="M.08 38.04S13.59 3.34 47.79.25c62.44-5.66 69.27 145.29 133.45 94.98 60.5-47.43 106.93 16.19 106.93 16.19" />
        </svg>
    @endif
</div>
