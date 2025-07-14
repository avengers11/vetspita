<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!-- Include your CSS files -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <style>
        input[type=range]::-webkit-slider-thumb {
            pointer-events: all;
            width: 24px;
            height: 24px;
            -webkit-appearance: none;
            /* @apply w-6 h-6 appearance-none pointer-events-auto; */
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            font-family: "Inter", serif;
        }

        .swiper {
            width: 100%;
            height: 100%;
            padding-bottom: 3.5rem;
        }

        .swipe_up-animation {
            animation: swipe_up 0.5s ease-in-out;
        }

        @keyframes swipe_up {
            0% {
                transform: translateY(20px);
                opacity: 0;
            }

            100% {
                transform: translateY(0px);
                opacity: 1;
            }
        }
    </style>

</head>

<body class="text-dark">
    <div class="flex min-h-screen justify-center">
        <div class="hidden lg:block lg:w-1/2 2xl:w-3/5 flex-shrink-0 bg-secondary">
            <img class="w-full h-full object-cover object-left"
                src="{{ asset('assets/frontend/images/mission_bg.png') }}" />
        </div>
        <div class="w-4/5 md:w-2/3 lg:flex-grow min-h-screen max-[768px]:py-10 md:p-10 lg:p-20">
            <div class="grid justify-center mb-10">
                <img src="{{ Storage::url(getSettings('logo')) }}" class="h-28 mb-5" alt="Vetspital Logo" />
                <h1 class="text-4xl mt-3 mb-5 font-medium text-center">User <span class="font-light">Login</span></h1>
            </div>
            <form action="" method="POST" class="space-y-8">
                @csrf 

                @if (session()->has('status'))
                    <p class="uppercase mb-2 font-medium text-secondary_dark text-center">{{ session()->get('msg') }}</p>
                @endif

                <div class="flex flex-col">
                    <label for="email" class="uppercase mb-2 font-medium text-secondary_dark">Email Address</label>
                    <input type="email" name="email" id="email" placeholder="Your Email"
                        class="border border-transparent outline-none focus:border focus:border-secondary focus:outline-none focus:ring-0 focus:shadow-none w-full p-4 bg-secondary/20" required>
                </div>
                <div class="flex flex-col">
                    <label for="password" class="uppercase mb-2 font-medium text-secondary_dark">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password"
                        class="border border-transparent outline-none focus:border focus:border-secondary focus:outline-none focus:ring-0 focus:shadow-none w-full p-4 bg-secondary/20" required>
                    <a href=""
                        class="text-secondary text-right text-sm mt-2 underline underline-offset-4">
                        Forgate Password?
                    </a>
                </div>
                <button type="submit"
                    class="w-full border-2 bg-secondary border-secondary transition-all duration-300 uppercase hover:bg-secondary_dark text-white font text-sm px-7 py-3 focus:outline-none tracking-widest">
                    Login
                </button>
            </form>
            <p class="text-center mt-8">Don't have an account? <a class="text-secondary_dark underline underline-offset-4" href="{{ route("user.register") }}">Register Here</a></p>
        </div>
    </div>
</body>

</html>
