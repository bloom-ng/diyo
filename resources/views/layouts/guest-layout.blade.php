<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- @vite('resources/css/app.css') --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style></style>
    @endif
    <title>Diyo Aviation Service</title>
</head>

<body class="bg-white">
    @if (session('success'))
        <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
        <script>
            Toastify({
                text: "{{ session('success') }}",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "green",
                stopOnFocus: true,
                ariaLive: "polite",
                onClick: function() {}
            }).showToast();
        </script>
    @endif
    @if (session('error'))
        <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
        <script>
            Toastify({
                text: "{{ session('error') }}",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "red",
                stopOnFocus: true,
                ariaLive: "polite",
                onClick: function() {}
            }).showToast();
        </script>
    @endif
    @if ($errors->any())
        <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
        @foreach ($errors->all() as $error)
            <script>
                Toastify({
                    text: "{{ $error }}",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "red",
                    stopOnFocus: true,
                    ariaLive: "polite",
                    onClick: function() {}
                }).showToast();
            </script>
        @endforeach
    @endif

    <section id="navbar"
        class="font-[markPro] font-bold text-[#2B2B2B] flex flex-row items-center justify-between gap-4 py-4 2xl:px-[100px] xl:px-[50px] lg:px-[30px] md:px-[15px] px-[8px] relative">
        <img src="/images/logo.png" alt="Diyo logo" class="w-32 md:w-40">

        <nav
            class="hidden md:flex items-center gap-4 2xl:gap-[62px] xl:gap-[50px] lg:gap-[30px] text-base 2xl:text-2xl uppercase">
            <a href="/"
                class="hover:text-[#039FC3] transition-colors {{ request()->is('/') ? 'text-[#039FC3]' : '' }}">Home</a>
            <a href="/services"
                class="hover:text-[#039FC3] transition-colors {{ request()->is('services*') ? 'text-[#039FC3]' : '' }}">Services</a>
            <a href="/blog"
                class="hover:text-[#039FC3] transition-colors {{ request()->is('blog*') ? 'text-[#039FC3]' : '' }}">Blog</a>
            <a href="/fleets"
                class="hover:text-[#039FC3] transition-colors {{ request()->is('fleets*') ? 'text-[#039FC3]' : '' }}">Our
                Fleet</a>
            <a href="/contact-us"
                class="hover:text-[#039FC3] transition-colors {{ request()->is('contact-us*') ? 'text-[#039FC3]' : '' }}">Contact
                Us</a>
        </nav>

        <a href="/book-flight" class="hidden md:block">
            <div
                class="rounded-full p-3 md:p-[14px] bg-gradient-to-r from-[#039FC3] to-[#2B2B2B] text-white uppercase text-center text-base md:text-lg hover:opacity-90 transition-opacity">
                Book Flight
            </div>
        </a>

        <button id="mobile-menu-button"
            class="block md:hidden text-2xl text-[#2B2B2B] hover:text-[#039FC3] transition-colors font-[markPro]">
            <i class="fas fa-bars"></i>
        </button>

    </section>

    <nav id="mobile-menu" class="hidden md:hidden top-full w-full bg-white py-4">
        <nav class="flex flex-col items-center gap-4 text-lg uppercase">
            <a href="/"
                class="hover:text-[#039FC3] transition-colors {{ request()->is('/') ? 'text-[#039FC3]' : '' }}">Home</a>
            <a href="/services"
                class="hover:text-[#039FC3] transition-colors {{ request()->is('services*') ? 'text-[#039FC3]' : '' }}">Services</a>
            <a href="/blog"
                class="hover:text-[#039FC3] transition-colors {{ request()->is('blog*') ? 'text-[#039FC3]' : '' }}">Blog</a>
            <a href="/fleets"
                class="hover:text-[#039FC3] transition-colors {{ request()->is('fleets*') ? 'text-[#039FC3]' : '' }}">Our
                Fleet</a>
            <a href="/contact-us"
                class="hover:text-[#039FC3] transition-colors {{ request()->is('contact-us*') ? 'text-[#039FC3]' : '' }}">Contact
                Us</a>
            <a href="/book-flight" class="w-[80%] text-center">
                <div
                    class="rounded-full p-3 bg-gradient-to-r from-[#039FC3] to-[#2B2B2B] text-white uppercase text-center text-lg hover:opacity-90 transition-opacity">
                    Book Flight
                </div>
            </a>
        </nav>
    </nav>

    <section class="2xl:px-[100px] xl:px-[50px] lg:px-[30px] md:px-[15px] px-[8px]">
        @yield('content')
    </section>

    <section id="newsletter" class="w-full relative overflow-hidden py-12">
        <img src="/images/plane.png" alt="plane" class="absolute w-52 md:w-[400px] -bottom-32">
        <div class="w-full 2xl:px-[100px] xl:px-[50px] lg:px-[30px] md:px-[15px] px-[8px]">
            <div
                class="bg-[url(/images/cloud-bg.png)] bg-cover bg-center w-full h-[408px] flex flex-col items-center justify-center rounded-xl">

                <h3 class="text-2xl 2xl:text-5xl font-medium text-center mb-16">
                    Be the First to Receive the Latest
                    <br>
                    Updates & Empty Leg Notifications!
                </h3>
                <form action="/subscribe" method="post" class="w-full flex items-center justify-center">
                    @csrf
                    <input type="email" name="email" id="email" placeholder="Email Address"
                        class="py-[27.5px] text-[#2B2B2B] border-[0.5px] border-[#2B2B2B] rounded-l-full w-[60%] lg:w-[30%] bg-white px-4">
                    <button
                        class="bg-gradient-to-r from-[#039FC3] to-[#2B2B2B] text-white uppercase text-center text-base md:text-xl px-[16px] 2xl:px-[62.5px] py-[26.5px] rounded-r-full">Subscribe</button>
                </form>
            </div>
        </div>
    </section>

    <section id="footer"
        class="bg-[#2B2B2B] font-[markPro] text-[#F4F4F4] 2xl:px-[100px] xl:px-[50px] lg:px-[30px] md:px-[15px] px-[8px] w-full py-[82px] overflow-hidden">

        <div class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 uppercase">
            <img src="/images/footer-logo.png" alt="Logo" class="w-60 h-auto">

            <div class="flex flex-col text-lg xl:text-2xl font-bold gap-5">
                <a href="/" class="text-white">Home</a>
                <a href="/services" class="text-white">Services</a>
                <a href="/blog" class="text-white">Blog</a>
                <a href="/fleets" class="text-white">Our
                    Fleet</a>
                <a href="/contact-us" class="text-white">Contact
                    Us</a>
            </div>
            <div class="flex flex-col text-lg xl:text-2xl font-bold gap-5">
                <a href="/" class="text-white">Legal</a>
                <a href="/services" class="text-white">Terms & Condition</a>
                <a href="/blog" class="text-white">Privacy</a>
            </div>

            <div class="flex flex-col text-lg xl:text-2xl font-bold gap-5">
                <a href="/" class="text-white">Contact Us</a>
                <a href="/services" class="text-white">tel: +234 704 222 2818</a>
                <a href="/blog" class="text-white">MAIL: diyoaviationservice@gmail.com</a>
                <a href="/blog" class="text-white">private jet terminal nnamdi azikiwe intl. airport abuja,
                    nigeria.</a>
            </div>
        </div>

        <hr class="w-full text-white my-[100px]">

        <div class="w-full flex-col justify-center items-center">
            <div class="flex justify-center items-center mb-[20px] gap-[40px]">
                <img src="/images/x.png" class="w-14 2xl:w-24 h-auto" />
                <img src="/images/linkedin.png" class="w-14 2xl:w-24 h-auto" />
                <img src="/images/instagram.png" class="w-14 2xl:w-24 h-auto" />
            </div>

            <p class="text-center text-[18px] 2xl:text-[28px]">
                © Copyright 2025. Diyo Aviation Services
            </p>

        </div>
    </section>

    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileMenuButton = document.getElementById('mobile-menu-button');

            if (!mobileMenu.contains(event.target) && !mobileMenuButton.contains(event.target)) {
                mobileMenu.classList.add('hidden');
            }
        });
    </script>
    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</body>

</html>
