@extends('layouts.guest-layout')

@section('content')
    <section id="hero" class="w-full">
        <div
            class="w-full bg-[url(/images/hero.png)] bg-cover bg-center h-[50vh] lg:h-[80vh] rounded-xl flex items-end justify-between">

            <h2
                class="font-[migate] text-white text-4xl lg:text-5xl xl:text-6xl 2xl:text-8xl align-text-bottom ml-[20px] mb-[20px] lg:ml-[40px] lg:mb-[40px]">
                Experience <br>Luxury with Diyo.
            </h2>
        </div>
    </section>

    <section id="partners" class="flex flex-col lg:flex-row items-center justify-between py-40 w-full">
        <h2 class="font-[migate] text-6xl mb-10 lg:mb-0">Our Partners</h2>

        <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 2xl:grid-cols-4 gap-8">
            <img src="/images/partner1.png" alt="parnters">
            <img src="/images/partner2.png" alt="parnters">
            <img src="/images/partner3.png" alt="parnters">
            <img src="/images/partner4.png" alt="parnters">
        </div>
    </section>

    <section id="about"
        class="bg-[url(/images/about.png)] bg-center bg-cover bg-no-repeat flex flex-col items-center justify-center w-[100vw] min-h-[80vh] h-fit 2xl:mx-[-100px] xl:mx-[-50px] lg:mx-[-30px] md:mx-[-15px] mx-[-8px] py-8">
        <h2 class="font-[migate] text-white text-3xl lg:text-5xl 2xl:text-6xl font-bold text-center mb-16">Welcome to<br>
            Diyo Aviation Services</h2>
        <div
            class="bg-white rounded-3xl font-[markPro] md:w-[70%] lg:w-[60%] 2xl:w-[50%] p-[30px] flex flex-col items-center">
            <p class="text-center text-lg md:text-2xl lg:text-3xl 2xl:text-[40px] font-medium mb-5">Where luxury meets the
                skies</p>
            <p class="text-center text-lg lg:text-[22px] 2xl:text-[28px] font-normal">
                As Nigeria's premier private jet charter service, we redefine elite travel with <span
                    class="font-bold">seamless, sophisticated,</span> and
                <span class="font-bold">personalized experiences.</span> Whether you're flying for business or leisure, Diyo
                Aviation ensures every journey
                is as exceptional as the destination.
            </p>

            <a href="/contact-us" class="w-full flex items-center justify-center">
                <div
                    class="mt-[60px] bg-gradient-to-r from-[#039FC3] to-[#2B2B2B] text-white rounded-full p-8 font-bold text-[20px] text-center w-[70%] 2xl:w-[50%]">
                    Contact Us
                </div>
            </a>
        </div>
    </section>

    <section id="services" class="mt-16">
        <h2 class="font-[migate] text-[#2B2B2B] text-3xl lg:text-5xl 2xl:text-6xl font-bold text-center mb-5">Why Diyo
            Aviation
            Services?</h2>
        <p class="text-center text-lg lg:text-[22px] 2xl:text-[28px] font-normal mb-16">
            Every journey is a perfect blend of luxury and precision, <br>ensuring you arrive in style and on schedule. We
            are
            always <br>committed to redefine your luxury travel at every touchpoint.
        </p>

        <div class="flex flex-col lg:flex-row w-full gap-5">
            <div class="border-[0.5px] border-[#2B2B2B] flex flex-col w-full lg:w-[50%] p-6 rounded-3xl">
                <h2 class="font-[migate] text-[40px] lg:text-[80px] font-bold text-[#B48438]">Timeless</h2>
                <img src="/images/service-plane1.png" alt="planes">
                <h2 class="font-[migate] text-[40px] lg:text-[80px] font-bold text-[#2B2B2B] text-right">Luxury</h2>
            </div>
            <div class="border-[0.5px] border-[#2B2B2B] flex flex-col w-full lg:w-[50%] p-6 rounded-3xl">
                <h2 class="font-[migate] text-[40px] lg:text-[80px] font-bold text-[#2B2B2B]/50 text-right">Unwavering</h2>
                <img src="/images/service-plane2.png" alt="planes">
                <h2 class="font-[migate] text-[40px] lg:text-[80px] font-bold text-[#B48438]">Excellence</h2>
            </div>
        </div>
    </section>

    <section id="fleets" class="mt-20">
        <h2 class="font-[migate] text-[#2B2B2B] text-3xl lg:text-5xl 2xl:text-6xl font-bold text-center mb-[70px]">Our Fleet
        </h2>

        <div class="relative overflow-hidden">
            <div class="carousel-container flex transition-transform duration-500 ease-in-out">
                @foreach ($fleets as $fleet)
                    <div class="carousel-item w-full flex-shrink-0">
                        <div class="flex flex-col lg:flex-row items-center justify-center">
                            <img src="{{ asset('storage/' . $fleet->image) }}" alt="{{ $fleet->name }}"
                                class="w-full lg:w-[50%] bg-white">
                            <div class="w-full lg:w-[50%]">
                                <div class="border-[0.5px] border-[#2B2B2B] flex flex-col w-full p-6 rounded-t-3xl">
                                    <p class="text-[32px] font-normal">{{ $fleet->name }}</p>
                                    <p class="text-[18px] lg:text-[20px] xl:text-[28px] font-light">
                                        {{ $fleet->description }}</p>
                                </div>
                                <div
                                    class="border-[0.25px] border-[#2B2B2B] flex flex-col w-full p-6 text-[#2B2B2B] font-[markPro]">
                                    <p class="text-[22px] lg:text-[28px] 2xl:text-[32px] font-normal">Maximum Passengers</p>
                                    <p class="text-3xl lg:text-[36px] xl:text-[40px] 2xl:text-[48px] font-bold">
                                        {{ $fleet->maximum_passenger }}</p>
                                </div>
                                <div
                                    class="border-[0.5px] border-[#2B2B2B] flex flex-col w-full p-6 rounded-b-3xl text-[#2B2B2B] font-[markPro]">
                                    <p class="text-[22px] lg:text-[28px] 2xl:text-[32px] font-normal">Miles Travelling
                                        Distance</p>
                                    <p class="text-3xl lg:text-[36px] xl:text-[40px] 2xl:text-[48px] font-bold">
                                        {{ number_format($fleet->miles) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="flex justify-center items-center gap-4 mt-8">
                <button onclick="prevSlide()" id="prevButton"
                    class="w-12 h-12 rounded-full flex items-center justify-center bg-[#039FC3]">
                    <i class="fas fa-arrow-left text-white"></i>
                </button>
                {{-- @if ($showFleetButton)
                    <a href="{{ route('fleet.index') }}"
                        class="px-6 py-3 rounded-full bg-[#039FC3] text-white font-[markPro] hover:bg-[#038AAB] transition-colors">
                        Show Fleet
                    </a>
                @else --}}
                <button onclick="nextSlide()" id="nextButton"
                    class="w-12 h-12 rounded-full flex items-center justify-center bg-[#039FC3]">
                    <i class="fas fa-arrow-right text-white"></i>
                </button>
                {{-- @endif --}}
            </div>
        </div>
    </section>

    <section class="py-[60px]" id="blog">
        <h2 class="font-[migate] text-[#2B2B2B] text-3xl lg:text-5xl 2xl:text-6xl font-bold text-center mb-[20px]">Our Blog
        </h2>

        <p class="text-center text-lg lg:text-[22px] 2xl:text-[28px] font-normal mb-16">
            Redefining Luxury Travel, One Journey at a Time
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
    </section>

    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.carousel-item');
        const container = document.querySelector('.carousel-container');
        const prevButton = document.getElementById('prevButton');
        const nextButton = document.getElementById('nextButton');

        // function updateButtons() {
        //     prevButton.classList.toggle('bg-[#039FC380]', currentSlide === 0);
        //     prevButton.classList.toggle('opacity-50', currentSlide === 0);
        //     prevButton.classList.toggle('cursor-not-allowed', currentSlide === 0);

        //     if (nextButton) {
        //         nextButton.classList.toggle('bg-[#039FC380]', currentSlide === slides.length - 1);
        //         nextButton.classList.toggle('opacity-50', currentSlide === slides.length - 1);
        //         nextButton.classList.toggle('cursor-not-allowed', currentSlide === slides.length - 1);
        //     }
        // }

        function updateButtons() {
            prevButton.classList.toggle('bg-[#039FC380]', currentSlide === 0);
            prevButton.classList.toggle('opacity-50', currentSlide === 0);
            prevButton.classList.toggle('cursor-not-allowed', currentSlide === 0);

            if (nextButton && currentSlide >= 4 && slides.length > 5) {
                // Hide next button and show "Show Fleet" button
                nextButton.style.display = 'none';
                const showFleetButton = document.createElement('a');
                showFleetButton.href = "/fleets";
                showFleetButton.className =
                    "px-6 py-3 rounded-full bg-[#039FC3] text-white font-[markPro] hover:bg-[#038AAB] transition-colors";
                showFleetButton.textContent = "Show Fleet";
                nextButton.parentNode.replaceChild(showFleetButton, nextButton);
            } else if (nextButton) {
                nextButton.classList.toggle('bg-[#039FC380]', currentSlide === slides.length - 1);
                nextButton.classList.toggle('opacity-50', currentSlide === slides.length - 1);
                nextButton.classList.toggle('cursor-not-allowed', currentSlide === slides.length - 1);
            }
        }

        function updateSlide() {
            const offset = currentSlide * -100;
            container.style.transform = `translateX(${offset}%)`;
            updateButtons();
        }

        function prevSlide() {
            if (currentSlide > 0) {
                currentSlide--;
                updateSlide();
            }
        }

        function nextSlide() {
            if (currentSlide < slides.length - 1) {
                currentSlide++;
                updateSlide();
            }
        }

        // Initialize
        updateButtons();
    </script>
@endsection
