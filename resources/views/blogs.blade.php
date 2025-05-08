@extends('layouts.guest-layout')

@section('content')
    <section id="hero" class="w-full">
        <div
            class="w-full bg-[url(/images/hero.png)] bg-cover bg-center h-[50vh] lg:h-[80vh] rounded-xl flex items-end justify-between">

            <h2
                class="font-[migate] text-white text-4xl lg:text-5xl xl:text-6xl 2xl:text-8xl align-text-bottom ml-[20px] mb-[20px] lg:ml-[40px] lg:mb-[40px]">
                Luxury Travel Tips, <br>One Blog at a Time.
            </h2>
        </div>
    </section>

    <section class="py-[60px]" id="blog">
        <h2 class="font-[migate] text-[#2B2B2B] text-3xl lg:text-5xl 2xl:text-6xl font-bold text-center mb-[20px]">
            Featured Blog
        </h2>

        <p class="text-center text-lg lg:text-[22px] 2xl:text-[28px] font-normal mb-16">
            Discover how we're transforming travel into unforgettable experiences
        </p>

        @if ($blogs->count() > 0)
            <div class="grid grid-col-1 lg:grid-cols-2 2xl:grid-cols-3 gap-[20px]">
                @foreach ($blogs as $blog)
                    <div class="rounded-3xl h-[480px] border-[0.5px] border-[#2B2B2B] overflow-hidden">
                        <div class="h-[50%] w-full bg-cover bg-center bg-no-repeat"
                            style="background-image: url('{{ $blog->featured_image ? asset('storage/' . $blog->featured_image) : '/images/blog-image.png' }}')">
                        </div>
                        <div class="h-[50%] w-full px-4 py-7 font-[markPro]">
                            <p class="font-normal text-3xl">{{ Str::limit($blog->title, 50) }}</p>
                            <a href="/blog/{{ $blog->id }}"
                                class="font-bold mt-[37px] text-2xl flex items-center gap-3">
                                Read More <span><i class="fas fa-arrow-right"></i></span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <p class="text-[#2B2B2B]/50 text-2xl font-[markPro]">No blog posts available at the moment.</p>
            </div>
        @endif

        <div class="mt-12 flex justify-center">
            {{ $blogs->links('pagination::tailwind') }}
        </div>
    </section>
@endsection
