{{-- @props(['label', 'url', 'invert' => false, 'color' => 'lime']) --}}

<a href="{{ $url }}"
    {{ $attributes->merge(['class' => ' self-start inline-flex group items-center gap-4  pl-4 rounded-full font-bold !no-underline transition duration-300 border border-transparent hover:border-[#adc954] ' . $getHoverBackground()]) }}>
    <span class="-translate-x-4 group-hover:translate-x-0  mt-px transition leading-0 duration-500 ease-in-out">
        {{ $label }}
    </span>

    <span class="inline-block rounded-full {{ $getBackground() }} p-2.5">
        @svg('arrow-right', $getArrowColor() . ' block w-6 h-6')
    </span>

</a>
