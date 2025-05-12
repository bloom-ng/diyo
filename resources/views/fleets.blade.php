@extends('layouts.guest-layout')

@section('content')
    <section id="hero" class="w-full">
        <div class="w-full h-[50vh] lg:h-[80vh] rounded-xl flex items-end justify-between relative overflow-hidden">
            <video autoplay muted loop id="myVideo" class="absolute min-w-full min-h-full">
                <source src="/images/fleet-video.mp4" type="video/mp4">
            </video>
            <!-- Dark overlay for better text visibility -->
            <div class="absolute inset-0 bg-[#039FC326]/85 rounded-xl"></div>

            <div class="w-[90%] lg:w-[50%] relative z-10">
                <h2
                    class="font-[migate] text-white text-4xl lg:text-5xl xl:text-6xl 2xl:text-8xl align-text-bottom ml-[20px] mb-[20px] lg:ml-[40px] lg:mb-[40px]">
                    Exceptional Luxury, <br>Unwavering Safety
                </h2>
            </div>
        </div>
    </section>

    @php
        $categoryIndex = 0;
    @endphp

    @foreach ($fleetsByCategory as $category => $data)
        @if (count($data['fleets']) > 0)
            <section id="{{ $category }}-jets" class="py-[60px]">
                <h2 class="font-[migate] text-[#2B2B2B] text-3xl lg:text-5xl 2xl:text-6xl font-bold text-center mb-5">
                    {{ $data['title'] }}
                </h2>
                <p class="font-[markPro] font-normal text-center mb-[78px]">{{ $data['description'] }}</p>

                <div class="relative overflow-hidden">
                    <div class="carousel-container-{{ $category }} flex transition-transform duration-500 ease-in-out">
                        @foreach ($data['fleets'] as $fleet)
                            <div class="carousel-item w-full flex-shrink-0">
                                <div class="flex flex-col lg:flex-row items-center justify-center">
                                    @if ($categoryIndex % 2 == 0)
                                        {{-- Image on left for even categories --}}
                                        <img src="{{ asset('storage/' . $fleet->image) }}" alt="{{ $fleet->name }}"
                                            class="w-full lg:w-[50%] bg-white">
                                        <div class="w-full lg:w-[50%]">
                                            <div
                                                class="border-[0.5px] border-[#2B2B2B] flex flex-col w-full p-6 rounded-t-3xl">
                                                <p class="text-[32px] font-normal">{{ $fleet->name }}</p>
                                                <p class="text-[18px] lg:text-[20px] xl:text-[28px] font-light">
                                                    {{ $fleet->description }}</p>
                                            </div>
                                            <div
                                                class="border-[0.25px] border-[#2B2B2B] flex flex-col w-full p-6 text-[#2B2B2B] font-[markPro]">
                                                <p class="text-[22px] lg:text-[28px] 2xl:text-[32px] font-normal">Maximum
                                                    Passengers</p>
                                                <p class="text-3xl lg:text-[36px] xl:text-[40px] 2xl:text-[48px] font-bold">
                                                    {{ $fleet->maximum_passenger }}</p>
                                            </div>
                                            <div
                                                class="border-[0.5px] border-[#2B2B2B] flex flex-col w-full p-6 rounded-b-3xl text-[#2B2B2B] font-[markPro]">
                                                <p class="text-[22px] lg:text-[28px] 2xl:text-[32px] font-normal">Miles
                                                    Travelling
                                                    Distance</p>
                                                <p class="text-3xl lg:text-[36px] xl:text-[40px] 2xl:text-[48px] font-bold">
                                                    {{ number_format($fleet->miles) }}</p>
                                            </div>
                                        </div>
                                    @else
                                        {{-- Image on right for odd categories --}}
                                        <div class="w-full lg:w-[50%]">
                                            <div
                                                class="border-[0.5px] border-[#2B2B2B] flex flex-col w-full p-6 rounded-t-3xl">
                                                <p class="text-[32px] font-normal">{{ $fleet->name }}</p>
                                                <p class="text-[18px] lg:text-[20px] xl:text-[28px] font-light">
                                                    {{ $fleet->description }}</p>
                                            </div>
                                            <div
                                                class="border-[0.25px] border-[#2B2B2B] flex flex-col w-full p-6 text-[#2B2B2B] font-[markPro]">
                                                <p class="text-[22px] lg:text-[28px] 2xl:text-[32px] font-normal">Maximum
                                                    Passengers</p>
                                                <p class="text-3xl lg:text-[36px] xl:text-[40px] 2xl:text-[48px] font-bold">
                                                    {{ $fleet->maximum_passenger }}</p>
                                            </div>
                                            <div
                                                class="border-[0.5px] border-[#2B2B2B] flex flex-col w-full p-6 rounded-b-3xl text-[#2B2B2B] font-[markPro]">
                                                <p class="text-[22px] lg:text-[28px] 2xl:text-[32px] font-normal">Miles
                                                    Travelling
                                                    Distance</p>
                                                <p class="text-3xl lg:text-[36px] xl:text-[40px] 2xl:text-[48px] font-bold">
                                                    {{ number_format($fleet->miles) }}</p>
                                            </div>
                                        </div>
                                        <img src="{{ asset('storage/' . $fleet->image) }}" alt="{{ $fleet->name }}"
                                            class="w-full lg:w-[50%] bg-white">
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="w-full flex flex-col lg:flex-row gap-5 lg:gap-0 items-center justify-between">
                        <div class="flex justify-center items-center gap-4 xl:gap-10 mt-8">
                            <button onclick="prevSlide('{{ $category }}')" id="prevButton-{{ $category }}"
                                class="w-12 h-12 rounded-full flex items-center justify-center bg-[#039FC3]">
                                <i class="fas fa-arrow-left text-white"></i>
                            </button>

                            <button onclick="nextSlide('{{ $category }}')" id="nextButton-{{ $category }}"
                                class="w-12 h-12 rounded-full flex items-center justify-center bg-[#039FC3]">
                                <i class="fas fa-arrow-right text-white"></i>
                            </button>
                        </div>

                        <a href="/book-flight">
                            <div
                                class="uppercase bg-gradient-to-r from-[#039FC3] to-[#2B2B2B] text-white rounded-full px-14 py-4 font-bold text-[20px] text-center max-h-20">
                                Book Flight
                            </div>
                        </a>
                    </div>
                </div>
            </section>
            @php
                $categoryIndex++;
            @endphp
        @endif
    @endforeach

    <script>
        const carouselStates = {};

        function initializeCarousel(category) {
            const container = document.querySelector(`.carousel-container-${category}`);
            const items = container.querySelectorAll('.carousel-item');
            const totalItems = items.length;

            carouselStates[category] = {
                currentIndex: 0,
                totalItems: totalItems
            };

            updateCarousel(category);
        }

        function updateCarousel(category) {
            const container = document.querySelector(`.carousel-container-${category}`);
            const state = carouselStates[category];
            container.style.transform = `translateX(-${state.currentIndex * 100}%)`;
        }

        function nextSlide(category) {
            const state = carouselStates[category];
            state.currentIndex = (state.currentIndex + 1) % state.totalItems;
            updateCarousel(category);
        }

        function prevSlide(category) {
            const state = carouselStates[category];
            state.currentIndex = (state.currentIndex - 1 + state.totalItems) % state.totalItems;
            updateCarousel(category);
        }

        // Initialize all carousels when the page loads
        document.addEventListener('DOMContentLoaded', () => {
            @foreach ($fleetsByCategory as $category => $data)
                @if (count($data['fleets']) > 0)
                    initializeCarousel('{{ $category }}');
                @endif
            @endforeach
        });
    </script>
@endsection
