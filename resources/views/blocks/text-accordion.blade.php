<div
    class="wp-block container grid lg:grid-cols-2  my-6 lg:my-12 gap-4 {{ $block->classes }} {{ $align == 'center' ? 'items-center' : '' }}">

    <div class="prose border-l border-lime pl-4 lg:pl-8">
        <InnerBlocks template="{{ $block->template }}" />
    </div>
    <div class="{{ $block->style == 'flipped' ? 'order-2' : '' }}">

        @foreach ($accordion as $accordionItem)
            <details class="accordion-item  ">
                <summary class="accordion-header"><strong>{{ $loop->index + 1 }}. </strong>
                    {{ $accordionItem['heading'] }}
                </summary>
                <div class="accordion-content">{!! $accordionItem['content'] !!}</div>
            </details>
        @endforeach
    </div>
</div>
