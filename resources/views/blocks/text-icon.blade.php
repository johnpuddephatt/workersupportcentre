<div class="wp-block container flex my-12 gap-4 {{ $block->classes }} items-start">
    <div
        class="{{ match ($block->style) {'beige' => 'bg-beige','mint' => 'bg-mint','peach' => 'bg-peach','orange' => 'bg-orange text-white','teal' => 'bg-teal text-white',default => 'bg-beige'} }} rounded-full p-4  ">
        @svg($icon, 'w-8 h-8')

    </div>

    <div class="prose">
        <InnerBlocks template="{{ $block->template }}" />
    </div>

</div>
