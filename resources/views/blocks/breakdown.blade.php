{{-- $block->block->align  --}}

<div class="mx-auto  wp-block {{ $block->block->align == 'full' ? 'alignwide' : '!max-w-6xl' }} relative py-12 lg:py-24 not-prose"
    style="{{ $block->inlineStyle }}">

    <div class=" px-0 container  relative">
        <h2 class="type-2xl  text-balance  {{ $block->block->align ? 'mb-8 lg:mb-20 ' : 'mb-6 md:mb-8' }}">
            {{ $heading }}</h2>
        <div class=" grid grid-cols-1 {{ $block->block->align ? 'lg:grid-cols-2' : '' }} gap-12 xl:gap-24">

            <div>
                <div class=" prose max-w-lg">{!! $content !!}</div>
                @if ($buttons)
                    <div class="mt-6 flex flex-col gap-2 ">
                        @foreach ($buttons as $button)
                            @if (is_array($button['link']))
                                <x-button color="lime" :label="$button['link']['title']" :url="$button['link']['url']" :target="$button['link']['target']" />
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="flex flex-col gap-8 lg:gap-12">
                @foreach ($breakdown as $item)
                    <div class="flex flex-row items-start gap-4 lg:gap-6">
                        <div class="p-2 rounded-full bg-mint">

                            @svg($item['icon'], 'w-6 h-6')
                        </div>
                        <div>
                            <h3 class="type-lg mb-2">{{ $item['title'] }}</h3>

                            <div class=" prose max-w-md">
                                {!! $item['content'] !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

</div>

<svg xmlns="http://www.w3.org/2000/svg" class="absolute -translate-x-full translate-y-1/3  w-3/4"
    viewBox="0 0 522.17 291.49">
    <path fill="none" stroke="#d6eddb" stroke-miterlimit="10" stroke-width=".5"
        d="M.21 56.37S37.37-4.91 103.24.6c120.26 10.06 82.95 298.51 221.38 224.48 130.49-69.78 197.33 66.29 197.33 66.29" />
</svg>
