  <div class="page-content prose relative pb-8 lg:pb-36">
      @php(the_content())
  </div>

  @if ($pagination())
      <nav class="page-nav" aria-label="Page">
          {!! $pagination !!}
      </nav>
  @endif
