{{-- $block->block->align  --}}
<div class="wp-block {{ $block->classes }} {{ match ($block->style) {'beige' => 'bg-beige','peach' => 'bg-peach','teal' => 'bg-teal text-white',default => 'bg-white'} }}  overflow-hidden relative py-8 lg:py-16 not-prose"
    style="{{ $block->inlineStyle }}">
    <div class="container px-0">
        @if ($block->style == 'teal')
            <svg xmlns="http://www.w3.org/2000/svg" class="absolute bottom-0 right-2/3 w-1/2 h-auto pointer-events-none"
                viewBox="0 0 288.24 111.46">
                <path fill="none" stroke="#eff2e2" stroke-miterlimit="10" stroke-width=".18"
                    d="M.08 38.04S13.59 3.34 47.79.25c62.44-5.66 69.27 145.29 133.45 94.98 60.5-47.43 106.93 16.19 106.93 16.19" />
            </svg>

            <svg xmlns="http://www.w3.org/2000/svg"
                class="absolute bottom-3/4 right-1/3 w-1/2 h-auto pointer-events-none" viewBox="0 0 288.24 111.46">
                <path fill="none" stroke="#caeb61" stroke-miterlimit="10" stroke-width=".18"
                    d="M.08 38.04S13.59 3.34 47.79.25c62.44-5.66 69.27 145.29 133.45 94.98 60.5-47.43 106.93 16.19 106.93 16.19" />
            </svg>
        @elseif($block->style == 'peach')
            <svg xmlns="http://www.w3.org/2000/svg"
                class="absolute bottom-3/4 right-1/3 w-1/2 h-auto pointer-events-none" viewBox="0 0 288.24 111.46">
                <path fill="none" stroke="#ff661f" stroke-miterlimit="10" stroke-width=".18"
                    d="M.08 38.04S13.59 3.34 47.79.25c62.44-5.66 69.27 145.29 133.45 94.98 60.5-47.43 106.93 16.19 106.93 16.19" />
            </svg>
            {{-- @else
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 191.87 185.09"
                class="absolute right-1/2 top-1/2 translate-x-16 translate-y-8 w-1/3">
                <path fill="none" stroke="#caeb61" stroke-miterlimit="10" stroke-width=".5"
                    d="M.5 185.08C-6.02 50.26 119.37 169.13 115.02 83.6 111.12 6.82 191.85.25 191.85.25" />
            </svg> --}}
        @endif
        <div
            class=" relative {{ $aligntop ? null : 'lg:items-center' }} flex flex-col-reverse  gap-8 lg:gap-12 xl:gap-16 lg:grid lg:grid-cols-2">
            <div class="">
                <h1
                    class="{{ $block->block->align ? 'type-2xl' : 'type-xl' }} type-underlined mb-6  md:mb-8  {{ match ($block->style) {'beige' => '!decoration-black','peach' => '!decoration-orange','teal' => '!decoration-lime',default => ''} }}">
                    {{ $heading }}</h1>
                <div class=" max-w-md">{!! $content !!}</div>
                @if ($buttons)
                    <div class="mt-6 flex flex-col gap-2 ">
                        @foreach ($buttons as $button)
                            @if (is_array($button['link']))
                                <x-button :class="$link_all ? 'before:inset-0 before:absolute ' : ''" :label="$button['link']['title']" :url="$button['link']['url']" :target="$button['link']['target']" />
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>
            @if ($image)
                {!! wp_get_attachment_image($image, $block->style == 'beige' ? 'square-xl' : 'landscape', false, [
                    'sizes' => ' (min-width: 1200px) 40vw, (min-width: 800px) 55vw, 75vw',
                    'class' =>
                        'w-full h-auto lg:mt-4 ' . ($block->style == 'beige' ? 'rounded-full max-w-sm lg:max-w-md lg:ml-auto' : ''),
                ]) !!}
            @endif

        </div>
    </div>
</div>
