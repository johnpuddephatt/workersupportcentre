    <svg xmlns="http://www.w3.org/2000/svg" class="absolute  right-0 w-[45%] -translate-y-1/2 -z-10 pointer-events-none"
        viewBox="0 0 286.48 364.98">
        <path fill="none" stroke="#f27038" stroke-miterlimit="10" stroke-width=".4"
            d="M41.43 364.78S.12 361.88.2 308.73c.17-113.14 262.81 13.66 232.59-140.38C204.3 23.14 286.43.19 286.43.19" />
    </svg>{{-- $block->block->align  --}}

    <div class="mx-auto container wp-block {{ $block->block->align == 'full' ? 'alignwide' : null }} {{ $block->block->align == 'wide' ? '!max-w-6xl' : null }}  relative pt-8  lg:pt-24 not-prose"
        style="{{ $block->inlineStyle }}">

        <div class="relative">
            <div class="flex gap-8 flex-col lg:flex-row">
                <div class="flex-1">
                    <h2 class="type-2xl  text-balance  {{ $block->block->align ? 'mb-8 lg:mb-20 ' : 'mb-6 md:mb-8' }}">
                        {{ $heading }}</h2>
                    <div class=" prose max-w-xl">{!! $content !!}</div>
                </div>
                @if ($image)
                    <div class="w-[28rem] max-w-full  flex-none">
                        {!! wp_get_attachment_image($image, 'landscape', false, [
                            'sizes' => ' (min-width: 1200px) 40vw, (min-width: 800px) 55vw, 75vw',
                            'class' => 'w-full clip-sun  flex-none',
                        ]) !!}
                    </div>
                @endif
            </div>

            <div>

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
        </div>

    </div>

    <div class="alignfull h-px bg-orange"></div>

    <div class="mx-auto container wp-block {{ $block->block->align == 'full' ? 'alignwide' : '!max-w-6xl' }} pt-px z-10 relative bg-white pb-12 lg:pb-24 not-prose"
        style="{{ $block->inlineStyle }}">
        <div class="relative">

            <div class="grid lg:grid-cols-3 mt-24 gap-20 lg:gap-12">
                @foreach ($donations as $donation)
                    <a href="{{ Str::of($donate_url)->replace('{amount}', $donation['amount']) }}" target="_blank"
                        class="border-orange bg-white relative z-10 border rounded-lg p-8">

                        <div
                            class="mx-auto size-48 flex items-center justify-center flex-col bg-orange p-4 text-center rounded-full -mt-24 mb-4">
                            <h3 class="text-6xl font-black antialiased tracking-tighter text-white leading-none">
                                £{{ $donation['amount'] }}</h3>
                            <p class="font-bold"> Per month</p>
                        </div>

                        <div class="text-center prose max-w-xl">
                            {!! $donation['content'] !!}
                        </div>

                    </a>
                @endforeach
            </div>
        </div>

    </div>
