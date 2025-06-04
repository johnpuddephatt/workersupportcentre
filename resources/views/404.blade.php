@extends('layouts.app')

@section('content')

  @if ($page)
    {!! apply_filters('the_content', $page->post_content) !!}
  @else
    <div class="container">
      <h1 class="type-2xl mb-4">404 - Page Not Found</h1>
      <p class="type-lg ">Sorry, the page you are looking for does not exist.</p>
      <p class="type-lg ">You can go back to the <a href="{{ home_url('/') }}" class="text-blue">homepage</a>
       </p>
    </div>
  @endif
@endsection
