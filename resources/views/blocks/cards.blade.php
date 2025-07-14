@if ($cards)

    <div class="wp-block {{ $block->classes }}  {{ !$block->block->align ? 'md:px-0 ' : null }} not-prose relative {{ $block->block->align == 'full' ? '' : 'my-16 container 2xl:my-24' }}"
        style="{{ $block->inlineStyle }}">

        <div
            class=" {{ $block->block->align && count($cards) > 1 ? 'md:grid-cols-2' : 'grid-cols-1' }} grid   gap-8 xl:gap-12">

            @foreach ($cards as $card)
                @if ($card['acf_fc_layout'] == 'manual_link')
                    @php($url = $card['link'])
                    @php($title = $card['title'])
                    @php($content = $card['content'])
                @elseif ($card['acf_fc_layout'] == 'page_or_post')
                    @php($url = get_the_permalink($card['page']))
                    @php($title = $card['override_details'] && $card['title'] ? $card['title'] : get_the_title($card['page']))
                    @php($content = $card['override_details'] && $card['content'] ? $card['content'] : get_the_excerpt($card['page']))

                    <!-- prettier-ignore-start -->
        
          <!-- prettier-ignore-end -->
                @endif

                <a href="{{ $url }}" class="group relative block  {{ $card['colour'] ?? 'bg-beige' }} p-8">
                    @if ($block->block->align !== 'full')
                        <div class="absolute -top-3 -bottom-3 w-px bg-black left-0"></div>
                    @endif
                    <div
                        class="flex h-full flex-col justify-between  {{ $block->block->align == 'full' ? 'container' : null }}">

                        <h3 class="min-h-16  {{ $block->block->align == 'full' ? '' : 'lg:min-h-28' }} type-xl mb-4">
                            {{ $title }}</h3>

                        <div class="flex items-start gap-2 lg:gap-4">
                            @if ($content)
                                <div class="prose ">
                                    {!! wp_trim_words($content, 15) !!}

                                </div>
                            @endif
                            <span
                                class="ml-auto mr-4 inline-block duration-500 group-hover:translate-x-4 transition rounded-full bg-black p-3 md:p-4">
                                @svg('arrow-right', ' text-lime block w-8 h-8 lg:w-12 lg:h-12')
                            </span>
                        </div>

                        <div class="mt-4 font-bold">
                            {{ 'Read more' ?? $card['content'] }}
                        </div>

                    </div>
                </a>
            @endforeach
        </div>

    </div>
@elseif($block->preview)
    <div class="rounded-small bg-beige-light p-8">
        Add some links to get started.
    </div>
@endif
