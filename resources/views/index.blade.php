@extends('layouts.app')

@section('content')
    <div class="page-content relative pb-36">

        {!! apply_filters('the_content', get_the_content(null, false, get_option('page_for_posts'))) !!}
    </div>

    {{-- @include('partials.page-header')

    @while (have_posts())
        @php(the_post())
        @php($post = get_post())
        <x-post-card :post="$post" :show_image="true" :show_excerpt="true" />
    @endwhile --}}
@endsection
