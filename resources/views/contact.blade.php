@extends('layouts.guest-layout')

@section('content')
    <section id="hero" class="w-full">
        <div
            class="w-full bg-[url(/images/contact-hero.png)] bg-cover bg-center h-[50vh] lg:h-[80vh] rounded-xl flex items-end justify-between">

            <h2
                class="font-[migate] text-white text-4xl lg:text-5xl xl:text-6xl 2xl:text-8xl align-text-bottom ml-[20px] mb-[20px] lg:ml-[40px] lg:mb-[40px]">
                Contact Diyo <br>Aviation Service.
            </h2>
        </div>
    </section>

    <section class="py-[60px]" id="message">
        <div class="w-full flex flex-col lg:flex-row justify-between gap-[60px] font-[markPro]">
            <div class="w-full lg:w-[40%]">
                <h2
                    class="font-[migate] text-[#2B2B2B] text-3xl lg:text-5xl 2xl:text-6xl font-bold text-center lg:text-left mb-[20px]">
                    Contact Us
                </h2>

                <p class=" text-center lg:text-left text-lg lg:text-[22px] 2xl:text-[28px] font-normal mb-16">
                    We are available to answer your questions and help you have a <br>seamless experience using our services
                </p>

                <div class="flex flex-col mt-[60px] text-left gap-[20px] lg:gap-[40px]">
                    <div>
                        <p class="mb-2 lg:mb-4 font-medium text-[28px] lg:text-[32px]">Email address</p>
                        <p class="font-normal text-[18px] lg:text-[28px]">diyoaviationservices@gmail.com</p>
                    </div>
                    <div>
                        <p class="mb-2 lg:mb-4 font-medium text-[28px] lg:text-[32px]">Phone number</p>
                        <p class="font-normal text-[18px] lg:text-[28px]">+234 704 222 2818</p>
                    </div>
                    <div>
                        <p class="mb-2 lg:mb-4 font-medium text-[28px] lg:text-[32px]">Our address</p>
                        <p class="font-normal text-[18px] lg:text-[28px]">
                            Private Jet Terminal
                            Nnamdi Azikiwe Intl. Airport
                            Abuja, Nigeria
                        </p>
                    </div>
                </div>
            </div>
            <form action="{{ route('contact.submit') }}" method="POST"
                class="border-[0.5px] border-[#2B2B2B] shadow-xs rounded-3xl px-[20px] py-[40px] lg:p-[40px] w-full lg:w-[60%]">
                @csrf
                <h3 class="text-3xl lg:text-[36px] xl:text-[40px] 2xl:text-[48px] font-normal">Send us a Message</h3>

                <div class="mt-[40px] flex flex-col gap-[10px]">
                    <input name="name" class="border-[0.5px] border-[#2B2B2B]/80 p-4 rounded-md" type="text"
                        placeholder="Full Name" required>
                    <input name="email" class="border-[0.5px] border-[#2B2B2B]/80 p-4 rounded-md" type="email"
                        placeholder="Email address" required>
                    <input name="phone" class="border-[0.5px] border-[#2B2B2B]/80 p-4 rounded-md" type="tel"
                        placeholder="Phone Number" required>
                    <textarea name="message" placeholder="Enter your message" class="border-[0.5px] border-[#2B2B2B]/80 p-4 rounded-md"
                        id="message" cols="30" rows="10" required></textarea>
                </div>

                <input type="hidden" name="recaptcha_token" id="recaptcha_token">

                <button
                    class="g-recaptcha w-full rounded-full text-white font-normal bg-gradient-to-r from-[#039FC3] to-[#2B2B2B] mt-[40px] py-4"
                    data-sitekey="{{ config('services.recaptcha.site_key') }}" data-callback='onSubmit' data-action='submit'
                    type="submit">SEND MESSAGE</button>
            </form>
        </div>
    </section>

    <section class="py-[60px]" id="map">
        <h2 class="font-[migate] text-[#2B2B2B] text-3xl lg:text-5xl 2xl:text-6xl font-bold text-center mb-[20px]">
            Find us on Google Maps
        </h2>

        <p class="text-center text-lg lg:text-[22px] 2xl:text-[28px] font-normal mb-16">
            Come take a physical tour on how we operate and how sleek <br>our fleets are.
        </p>
    </section>

    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function onSubmit(token) {
            document.getElementById("recaptcha_token").value = token;
            document.querySelector("form").submit();
        }
    </script>
@endsection
