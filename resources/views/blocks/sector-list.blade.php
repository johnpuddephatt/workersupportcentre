@if ($sectors)
    <div class="wp-block my-16 {{ $block->classes }}" style="{{ $block->inlineStyle }}">
        @foreach ($sectors as $sector)
            <x-sector-card :sector="$sector" />
        @endforeach
    </div>
@endif
