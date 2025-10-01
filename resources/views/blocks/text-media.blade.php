<div
    class="not-prose wp-block container grid lg:grid-cols-2 my-8 lg:my-24 gap-8 lg:gap-12 {{ $block->classes }} {{ $align == 'center' ? 'items-center' : '' }}">

    <div
        class="{{ $block->style == 'flipped' ? 'order-2' : '' }} max-lg:order-2 relative lg:flex {{ match ($align) {
            'top' => 'items-start',
            'center' => '',
            'bottom' => 'items-end',
            default => 'items-stretch',
        } }}">
        @if ($image)
            {!! wp_get_attachment_image($image, $image_crop == 'landscape' ? 'landscape' : 'square-xl', false, [
                'sizes' => '(min-width: 1200px) 40vw, (min-width: 800px) 55vw, 75vw',
                'class' =>
                    'w-full ' .
                    ($image_crop == 'circle' && $align !== 'stretch' ? 'mx-auto max-w-sm rounded-full' : '') .
                    ' ' .
                    ($align == 'stretch' ? ' lg:inset-0 lg:absolute w-full lg:h-full lg:object-cover lg:object-center' : ' '),
            ]) !!}
        @endif

    </div>

    <div class="prose lg:border-l lg:border-lime lg:pl-8">
        <InnerBlocks template="{{ $block->template }}" />
    </div>

</div>
