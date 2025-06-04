@include('blocks.hero', [
    'heading' => get_the_title(),
    'content' => get_the_excerpt(),
    'buttons' => [],
    'image' => get_post_thumbnail_id(),
    'block' => (object) [
        'classes' => 'mb-16',

        'style' => 'beige',
        'inlineStyle' => '',
        'block' => (object) [
            'align' => 'full',
        ],
    ],
])

<div class="container flex justify-between  flex-col-reverse gap-8 lg:flex-row lg:gap-16 mb-16">
    <div class="lg:border-r flex-grow lg:border-lime">
        <div class="page-content prose max-w-none">
            {!! $content !!}

        </div>
    </div>
    <div class="lg:w-48 bg-lime lg:bg-transparent p-8 lg:p-0">
        <div class="sticky top-12">
            {!! $toc !!}
        </div>
    </div>

</div>
