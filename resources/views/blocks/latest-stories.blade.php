<div id="stories"
    class="wp-block {{ $block->classes }} {{ $block->block->align ? 'container' : null }} not-prose relative z-10 mx-auto my-16 2xl:my-24"
    style="{{ $block->inlineStyle }}">

    <div class=" py-12 lg:py-0 px-8  ">
        {{-- Title --}}

        @if ($title)
            <h2 class="type-2xl pb-12">{{ $title }}</h2>
        @endif

        <div class="max-w-4xl gap-6 mb-16 divide-y border-b border-b-lime divide-lime">
            @forelse ($stories as $post)
                @include('blocks.story', [
                    'block' => (object) [
                        'style' => 'alternative',
                    ],
                    'heading' => get_the_title($post),
                    'content' => get_the_excerpt($post),
                    'image' => get_post_thumbnail_id($post),
                    'buttons' => [
                        [
                            'link' => [
                                'url' => get_permalink($post),
                                'title' => 'Read the full story',
                                'target' => '_self',
                            ],
                        ],
                    ],
                ])
            @empty
                <div class="text-center py-24 bg-beige">
                    <p class="text-lg">No stories found.</p>
                </div>
            @endforelse
        </div>

        <div class="max-w-4xl text-center">
            @if ($read_more_link)
                <a class="!underline  underline-offset-8 font-semibold" href="{{ $read_more_link['url'] }}"
                    target="{{ $read_more_link['target'] }}">{{ $read_more_link['title'] }}
                </a>
            @endif
        </div>
    </div>

</div>
