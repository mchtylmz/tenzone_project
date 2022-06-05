<x-site-layout>
    <x-slot name="style">default.css</x-slot>
    <x-slot name="title">{{ $blog->title }}</x-slot>

    @push('styles')
        <meta name="description" content="{{ $blog->brief }}" />

        <!-- Twitter Card data (Large image) -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@publisher_handle">
        <meta name="twitter:creator" content="@tenzone">
        <meta name="twitter:title" content="{{ $blog->title }}">
        <meta name="twitter:description" content="{{ $blog->brief }}">
        <meta name="twitter:image" content="{!! asset($blog->image) !!}">

        <!-- FB Open Graph data -->
        <meta property="og:title" content="{{ $blog->title }}" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="{!! asset($blog->image) !!}" />
        <meta property="og:image" content="{!! asset($blog->image) !!}" />
        <meta property="og:description" content="{{ $blog->brief }}" />

        <!-- Schema.org. Google+ -->
        <meta itemprop="name" content="{{ $blog->title }}">
        <meta itemprop="description" content="{{ $blog->brief }}">
        <meta itemprop="image" content="{!! asset($blog->image) !!}">
    @endpush

    <section class="tz-page-normal">
        <div class="container">

            <div class="tz-blog-page">

                <h1 class="title">{{ $blog->title }}</h1>

                <img src="{!! asset($blog->image) !!}" alt="blog" class="imgblog">

                @if($author = $blog->author()->first())
                    <div class="author flex-start">
                        <img src="{{ asset('images/profile.png') }}" alt="profile">
                        <div class="body">
                            <span class="name">{{ $author->fullname }}</span>
                            <span class="date">{{ date('M d, l', strtotime($blog->created_at)) }}</span>
                        </div>
                    </div>
                @endif


                <div class="line"></div>

                {{ $blog->content }}

                <div class="btn-social">
                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ route('blog.detail', $blog->slug) }}" class="btn btn-outline-light"><i class="fab fa-facebook"></i> Share on Facebook</a>
                    <a target="_blank" href="https://twitter.com/intent/tweet?url={{ route('blog.detail', $blog->slug) }}" class="btn btn-outline-light"><i class="fab fa-twitter"></i> Share on Twitter</a>
                </div>

            </div>

        </div>
    </section>

</x-site-layout>
