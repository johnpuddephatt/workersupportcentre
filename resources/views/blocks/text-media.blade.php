<div
    class="not-prose wp-block container grid lg:grid-cols-2 my-8 lg:my-24 gap-8 lg:gap-12 {{ $block->classes }} {{ $align == 'center' ? 'items-center' : '' }}">

    <div
        class="{{ $block->style == 'flipped' ? 'order-2' : '' }} max-lg:order-2 relative flex {{ match ($align) {
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
                    ($align == 'stretch' ? ' inset-0 absolute w-full h-full object-cover object-center' : ' '),
            ]) !!}
        @endif

    </div>

    <div class="prose border-l border-lime pl-4 lg:pl-8">
        <InnerBlocks template="{{ $block->template }}" />
    </div>

</div>
