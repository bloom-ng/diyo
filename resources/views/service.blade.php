@extends('layouts.guest-layout')

@section('content')
    <section id="hero" class="w-full">
        <div
            class="w-full bg-[url(/images/service.png)] bg-cover bg-center h-[50vh] lg:h-[80vh] rounded-xl flex items-end justify-between">

            <h2
                class="font-[migate] text-white text-4xl lg:text-5xl xl:text-6xl 2xl:text-8xl align-text-bottom ml-[20px] mb-[20px] lg:ml-[40px] lg:mb-[40px]">
                Welcome to Diyo <br>Aviation Services.
            </h2>
        </div>
    </section>

    <section id="services" class="py-[60px]">
        <h2 class="font-[migate] text-[#2B2B2B] text-3xl lg:text-5xl 2xl:text-6xl font-bold text-center mb-[20px]">
            Our Services
        </h2>

        <p class="text-center text-lg lg:text-[22px] 2xl:text-[28px] font-normal mb-16">
            We specialize in providing world-class private jet charter <br>services tailored for travelers. We are
            recognized
            globally for <br>our commitment to exceptional service, seamless efficiency, <br>and luxurious air travel
            experiences.
        </p>

        <div
            class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 mt-[60px] gap-[20px] justify-center items-center w-full">
            <img src="/images/services1.png" alt="" class="rounded-3xl border-[0.5px] border-[#2B2B2B] self-center">
            <img src="/images/services2.png" alt=""
                class="rounded-3xl border-[0.5px] border-[#2B2B2B] mt-0 lg:mt-10">
            <img src="/images/services3.png" alt="" class="rounded-3xl border-[0.5px] border-[#2B2B2B]">
        </div>
    </section>

    <section id="why-us" class="py-[60px]">
        <h2 class="font-[migate] text-[#2B2B2B] text-3xl lg:text-5xl 2xl:text-6xl font-bold text-center mb-[20px]">
            Why Choose Diyo
        </h2>

        <p class="text-center text-lg lg:text-[22px] 2xl:text-[28px] font-normal mb-16">
            We don't just get you to your destination, we do it with <br>unmatched expertise, personalized care, and a
            commitment <br>to making every flight exceptional.
        </p>

        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-[20px] font-[markPro]">
            <div
                class="group leading-[-2px] min-h-[480px] p-[22px] bg-[#039FC3]/30 hover:bg-gradient-to-r from-[#039FC3] to-[#2B2B2B] border-[0.5px] border-[#2B2B2B] rounded-3xl hover:text-white cursor-pointer">
                <div class="mb-6">
                    <img src="/images/handshake.svg" alt="icon" class="group-hover:hidden">
                    <img src="/images/handshake-hover.svg" alt="icon" class="hidden group-hover:block">
                    <h3 class="font-normal text-[44px] mt-4">
                        Our Commitment
                    </h3>
                </div>
                <p class="text-[20px] mb-10">
                    At Diyo Aviation, we deliver precise, professional charter services. From a quick local trip to a
                    long-haul flight, our top-tier fleet guarantees safety, comfort, and reliability all the way.
                </p>

                <a href="/blog">
                    <button
                        class="uppercase font-bold text-[14px] rounded-full py-3 px-[22px] bg-gradient-to-r from-[#039FC3] to-[#2B2B2B] group-hover:from-white group-hover:to-white cursor-pointer transition-all duration-300">
                        <p
                            class="text-white group-hover:bg-gradient-to-r group-hover:from-[#039FC3] group-hover:to-[#2B2B2B] group-hover:inline-block group-hover:text-transparent group-hover:bg-clip-text">
                            Visit Our Blog
                        </p>
                    </button>
                </a>
            </div>

            <div
                class="group leading-[-2px] min-h-[480px] p-[22px] bg-[#039FC3]/30 hover:bg-gradient-to-r from-[#039FC3] to-[#2B2B2B] border-[0.5px] border-[#2B2B2B] rounded-3xl hover:text-white cursor-pointer">
                <div class="mb-6">
                    <img src="/images/plane.svg" alt="icon" class="group-hover:hidden">
                    <img src="/images/plane-hover.svg" alt="icon" class="hidden group-hover:block">
                    <h3 class="font-normal text-[44px] mt-4">
                        Unmatched Fleet
                    </h3>
                </div>
                <p class="text-[20px] mb-10">
                    Our fleet ranges from nimble light jets like the Citation CJ1 to spacious, luxury options like the
                    Challenger 350—each carefully chosen to match your travel needs with style and comfort
                </p>

                <a href="/fleets">
                    <button
                        class="uppercase font-bold text-[14px] rounded-full py-3 px-[22px] bg-gradient-to-r from-[#039FC3] to-[#2B2B2B] group-hover:from-white group-hover:to-white cursor-pointer transition-all duration-300">
                        <p
                            class="text-white group-hover:bg-gradient-to-r group-hover:from-[#039FC3] group-hover:to-[#2B2B2B] group-hover:inline-block group-hover:text-transparent group-hover:bg-clip-text">
                            View Our Fleet
                        </p>
                    </button>
                </a>
            </div>

            <div
                class="group leading-[-2px] min-h-[480px] p-[22px] bg-[#039FC3]/30 hover:bg-gradient-to-r from-[#039FC3] to-[#2B2B2B] border-[0.5px] border-[#2B2B2B] rounded-3xl hover:text-white cursor-pointer">
                <div class="mb-6">
                    <img src="/images/search.svg" alt="icon" class="group-hover:hidden">
                    <img src="/images/search-hover.svg" alt="icon" class="hidden group-hover:block">
                    <h3 class="font-normal text-[44px] mt-4">
                        Global Reach, Local Expertise
                    </h3>
                </div>
                <p class="text-[20px] mb-10">
                    Diyo Aviation delivers smooth, high-end travel experiences across borders—combining global reach with a
                    strong commitment to excellence.
                </p>

                <a href="/book-flight">
                    <button
                        class="uppercase font-bold text-[14px] rounded-full py-3 px-[22px] bg-gradient-to-r from-[#039FC3] to-[#2B2B2B] group-hover:from-white group-hover:to-white cursor-pointer transition-all duration-300">
                        <p
                            class="text-white group-hover:bg-gradient-to-r group-hover:from-[#039FC3] group-hover:to-[#2B2B2B] group-hover:inline-block group-hover:text-transparent group-hover:bg-clip-text">
                            Book flight
                        </p>
                    </button>
                </a>
            </div>

            <div
                class="group leading-[-2px] min-h-[480px] p-[22px] bg-[#039FC3]/30 hover:bg-gradient-to-r from-[#039FC3] to-[#2B2B2B] border-[0.5px] border-[#2B2B2B] rounded-3xl hover:text-white cursor-pointer">
                <div class="mb-6">
                    <img src="/images/robot.svg" alt="icon" class="group-hover:hidden">
                    <img src="/images/robot-hover.svg" alt="icon" class="hidden group-hover:block">
                    <h3 class="font-normal text-[44px] mt-4">
                        Personalized Service
                    </h3>
                </div>
                <p class="text-[20px] mb-10">
                    Every trip with Diyo Aviation is crafted around you. From gourmet dining to tailored onboard service, we
                    go beyond the ordinary to deliver a truly personal flying experience.
                </p>

                <a href="/contact-us">
                    <button
                        class="uppercase font-bold text-[14px] rounded-full py-3 px-[22px] bg-gradient-to-r from-[#039FC3] to-[#2B2B2B] group-hover:from-white group-hover:to-white cursor-pointer transition-all duration-300">
                        <p
                            class="text-white group-hover:bg-gradient-to-r group-hover:from-[#039FC3] group-hover:to-[#2B2B2B] group-hover:inline-block group-hover:text-transparent group-hover:bg-clip-text">
                            Contact Us
                        </p>
                    </button>
                </a>
            </div>
        </div>
    </section>
@endsection
