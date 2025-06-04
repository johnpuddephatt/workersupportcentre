<div class="{{ $block->classes }} my-12 2xl:my-16" style="{{ $block->inlineStyle }}">
  @if ($title)
    <h2 class="type-lg mb-12 text-blue-dark">{{ $title }}</h2>
  @endif
  <div class="not-prose flex flex-col gap-4 lg:gap-8">
    @forelse ($opportunities as $opportunity)
      <x-opportunity-card :opportunity="$opportunity" />
    @empty
      <p class="rounded-small bg-pink-light p-8 text-center">
        {{ $no_opportunities_message ?: 'No opportunities to show you.' }}
      </p>
    @endforelse
  </div>
</div>
