<x-site-layout>
    <x-slot name="style">home.css</x-slot>
    <x-slot name="title">{{ __('Blogs') }}</x-slot>

    <section class="pb-5 mb-5 pt-0">
        <div class="container pt-5">
            <div class="relative pt-5">
                <h2 class="head-title inline-block">{{ __('Blogs') }}</h2>
            </div>
            <div class="row mt-4 mb-4 justify-content-start">
                @foreach($blogs as $blog)
                    <div class="col-lg-4 p-3">
                        <div class="blog-item blog-hover">
                            <div class="relative bg-danger" style="margin-top:36px !important">
                                <img src="{{ $blog->image }}" alt="blog">
                            </div>
                            <div class="content pe-3">
                                <a href="{{ route('blog.detail', $blog->slug) }}">
                                    <h6 class="title text-start text-dark" style="padding-left: 38px !important;">
                                        {{ $blog->title }}
                                    </h6>
                                </a>
                                <a href="{{ route('blog.detail', $blog->slug) }}">
                                    <p class="text-start text-dark" style="padding-left: 38px !important;">
                                        {{ $blog->brief }}
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $blogs->links() }}
        </div>
    </section>
</x-site-layout>
