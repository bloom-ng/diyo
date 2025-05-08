@extends('layouts.guest-layout')

@section('content')
    <section id="hero" class="w-full">
        <div class="w-full h-[50vh] lg:h-[80vh] rounded-xl flex items-end justify-between relative">
            <img class="h-full w-full absolute"
                src="{{ $blog->featured_image ? asset('storage/' . $blog->featured_image) : asset('images/blog-image.png') }}"
                alt="{{ $blog->title }}">
            <!-- Dark overlay for better text visibility -->
            <div class="absolute inset-0 bg-[#039FC326]/85 rounded-xl"></div>

            <div class="w-[90%] lg:w-[50%] relative z-10">
                <h2
                    class="font-[migate] text-white text-4xl lg:text-5xl xl:text-6xl 2xl:text-8xl align-text-bottom ml-[20px] mb-[20px] lg:ml-[40px] lg:mb-[40px]">
                    {{ $blog->title }}
                </h2>
            </div>
        </div>
    </section>

    <section
        class="bg-gradient-to-r from-[#039FC3] to-[#2B2B2B] flex flex-col items-center justify-center w-[100vw] max-h-[128px] xl:h-[128px] h-fit 2xl:mx-[-100px] xl:mx-[-50px] lg:mx-[-30px] md:mx-[-15px] mx-[-8px] py-8 mt-[120px]">
        <div
            class="w-full 2xl:px-[100px] xl:px-[50px] lg:px-[30px] md:px-[15px] px-[8px] flex flex-col md:flex-row justify-center md:justify-between items-center text-white">
            <p class="font-[markPro] font-bold text-base md:text-lg lg:text-2xl xl:text-4xl">
                Subscribe to get more posts like this
            </p>

            <p class="font-[markPro] font-normal text-base md:text-lg lg:text-2xl xl:text-4xl">
                Posted on {{ $blog->created_at->format('jS F Y') }}
            </p>
        </div>
    </section>

    <section id="content" class="py-[60px]">
        <div class="prose max-w-none font-[markPro] 2xl:px-[100px] xl:px-[50px] lg:px-[30px] md:px-[15px] px-[8px]">
            {!! $blog->content !!}
        </div>

        <div class="w-full gap-6 flex flex-col items-center justify-center mt-20">
            <p class="font-[markPro] font-medium text-base md:text-lg lg:text-2xl xl:text-4xl">
                Share this post
            </p>
            <div class="flex gap-5 items-center justify-center">
                <a href="https://www.instagram.com/share?url={{ urlencode(request()->url()) }}&title={{ urlencode($blog->title) }}"
                    target="_blank" rel="noopener noreferrer" class="hover:opacity-80 transition-opacity">
                    <img src="/images/instagram-variant.png" alt="Share on Instagram">
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank"
                    rel="noopener noreferrer" class="hover:opacity-80 transition-opacity">
                    <img src="/images/facebook.png" alt="Share on Facebook">
                </a>
                <button onclick="copyToClipboard()" class="hover:opacity-80 transition-opacity cursor-pointer">
                    <img src="/images/link-variant.png" alt="Copy link">
                </button>
                <a href="https://wa.me/?text={{ urlencode($blog->title . ' ' . request()->url()) }}" target="_blank"
                    rel="noopener noreferrer" class="hover:opacity-80 transition-opacity">
                    <img src="/images/whatsapp.png" alt="Share on WhatsApp">
                </a>
            </div>
        </div>
    </section>

    <section class="py-[60px]" id="blog">
        <h2 class="font-[migate] text-[#2B2B2B] text-3xl lg:text-5xl 2xl:text-6xl font-bold text-center mb-[20px]">
            You May Also Like
        </h2>

        <p class="text-center text-lg lg:text-[22px] 2xl:text-[28px] font-normal mb-16">
            Discover how we're transforming travel into unforgettable experiences
        </p>

        @if ($relatedBlogs->count() > 0)
            <div class="grid grid-col-1 lg:grid-cols-2 2xl:grid-cols-3 gap-[20px]">
                @foreach ($relatedBlogs as $relatedBlog)
                    <div class="rounded-3xl h-[480px] border-[0.5px] border-[#2B2B2B] overflow-hidden">
                        <div class="h-[50%] w-full bg-cover bg-center bg-no-repeat"
                            style="background-image: url('{{ $relatedBlog->featured_image ? asset('storage/' . $relatedBlog->featured_image) : '/images/blog-image.png' }}')">
                        </div>
                        <div class="h-[50%] w-full px-4 py-7 font-[markPro]">
                            <p class="font-normal text-3xl">{{ Str::limit($relatedBlog->title, 50) }}</p>
                            <a href="/blog/{{ $relatedBlog->id }}"
                                class="font-bold mt-[37px] text-2xl flex items-center gap-3">
                                Read More <span><i class="fas fa-arrow-right"></i></span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <p class="text-[#2B2B2B]/50 text-2xl font-[markPro]">No related blog posts available at the moment.</p>
            </div>
        @endif
    </section>

    <script>
        function copyToClipboard() {
            const url = window.location.href;
            navigator.clipboard.writeText(url).then(() => {
                // You can add a toast notification here if you have one
                alert('Link copied to clipboard!');
            }).catch(err => {
                console.error('Failed to copy text: ', err);
            });
        }
    </script>
@endsection
