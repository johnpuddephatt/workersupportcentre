<div class="wp-block container grid lg:grid-cols-2  my-6 lg:my-12 gap-4 {{ $block->classes }} items-start">

    <div class="prose">
        <InnerBlocks template="{{ $block->template }}" />
    </div>
    <div>

        @foreach ($accordion as $accordionItem)
            <details class="accordion-item">
                <summary class="accordion-header"><strong>{{ $loop->index + 1 }}. </strong>
                    {{ $accordionItem['heading'] }}
                </summary>
                <div class="accordion-content">{!! $accordionItem['content'] !!}</div>
            </details>
        @endforeach
    </div>
</div>
