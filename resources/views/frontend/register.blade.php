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
    <div class="lg:flex min-h-screen">
        <div class="flex-grow min-h-screen px-6  max-[600px]:py-16 sm:p-20">
            <div class="grid justify-center mb-10">
                <img src="{{ Storage::url(getSettings('logo')) }}" class="h-28 mb-5" alt="Vetspital Logo" />
                <h1 class="text-4xl mt-3 mb-5 font-medium text-center">User <span class="font-light">Register</span></h1>
            </div>
            <form class="md:grid md:grid-cols-2 gap-x-5 md:gap-y-8 space-y-8 md:space-y-0" action="">
                <div class="flex flex-col">
                    <label for="owner_name" class="uppercase mb-2 font-medium text-primary_dark">Owner Name</label>
                    <input type="text" name="owner_name" id="owner_name" placeholder="Type Owner Name"
                        class="border border-transparent outline-none focus:border focus:border-primary focus:outline-none focus:ring-0 focus:shadow-none w-full p-4 bg-primary/20">
                </div>
                <div class="flex flex-col">
                    <label for="contact" class="uppercase mb-2 font-medium text-primary_dark">Contact Number</label>
                    <input type="text" name="contact" id="contact" placeholder="Type Contact Number"
                        class="border border-transparent outline-none focus:border focus:border-primary focus:outline-none focus:ring-0 focus:shadow-none w-full p-4 bg-primary/20">
                </div>
                <div class="flex flex-col col-span-2">
                    <label for="species" class="uppercase mb-2 font-medium text-primary_dark">Selcet Species</label>
                    <select name="species" id="species"
                        class="border border-transparent outline-none focus:border focus:border-primary focus:outline-none focus:ring-0 focus:shadow-none w-full p-4 bg-primary/20">
                        <option value="dog">Dog</option>
                        <option value="cat">Cat</option>
                    </select>
                </div>
                <div class="flex flex-col">
                    <label for="pet_name" class="uppercase mb-2 font-medium text-primary_dark">Pet Name</label>
                    <input type="text" name="pet_name" id="pet_name" placeholder="Type Pet Name"
                        class="border border-transparent outline-none focus:border focus:border-primary focus:outline-none focus:ring-0 focus:shadow-none w-full p-4 bg-primary/20">
                </div>
                <div class="flex flex-col">
                    <label for="breed" class="uppercase mb-2 font-medium text-primary_dark">Breed</label>
                    <input type="text" name="breed" id="breed" placeholder="Type Pet Breed"
                        class="border border-transparent outline-none focus:border focus:border-primary focus:outline-none focus:ring-0 focus:shadow-none w-full p-4 bg-primary/20">
                </div>
                <div class="flex flex-col">
                    <label for="age" class="uppercase mb-2 font-medium text-primary_dark">Age (Months)</label>
                    <input type="number" name="age" id="age" placeholder="Type Age"
                        class="border border-transparent outline-none focus:border focus:border-primary focus:outline-none focus:ring-0 focus:shadow-none w-full p-4 bg-primary/20">
                </div>
                <div class="flex flex-col">
                    <label for="sex" class="uppercase mb-2 font-medium text-primary_dark">Sex</label>
                    <select name="sex" id="sex"
                        class="border border-transparent outline-none focus:border focus:border-primary focus:outline-none focus:ring-0 focus:shadow-none w-full p-4 bg-primary/20">
                        <option value="dog">Male</option>
                        <option value="cat">Female</option>
                    </select>
                </div>
                <div class="flex flex-col">
                    <label for="vaccinated" class="uppercase mb-2 font-medium text-primary_dark">Vaccinated</label>
                    <div class="flex items-center gap-10 py-4">
                        <div class="flex items-center">
                            <input checked id="vaccinated_true" type="radio" value="" name="vaccinated"
                                class="w-4 h-4 text-primary_dark bg-gray-100 border-gray-300 focus:ring-primary_dark focus:ring-2">
                            <label for="vaccinated_true"
                                class="ms-2 text-sm font-medium text-gray-400 dark:text-gray-500">Yes</label>
                        </div>
                        <div class="flex items-center">
                            <input id="vaccinated_false" type="radio" value="" name="vaccinated"
                                class="w-4 h-4 text-primary_dark bg-gray-100 border-gray-300 focus:ring-primary_dark focus:ring-2">
                            <label for="vaccinated_false"
                                class="ms-2 text-sm font-medium text-gray-400 dark:text-gray-500">No</label>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col">
                    <label for="vaccine_date" class="uppercase mb-2 font-medium text-primary_dark">Vaccine
                        Date</label>
                    <input type="date" name="vaccine_date" id="vaccine_date"
                        class="border border-transparent outline-none focus:border focus:border-primary focus:outline-none focus:ring-0 focus:shadow-none w-full p-4 bg-primary/20">
                </div>
                <button type="button"
                    class="col-span-2 w-full border-2 bg-primary_dark/80 border-primary transition-all duration-300 uppercase hover:bg-primary_dark text-white font text-sm px-7 py-3 focus:outline-none tracking-widest">
                    Register
                </button>
            </form>
            <p class="text-center mt-8">Already have an account? <a
                    class="text-primary_dark underline underline-offset-4 hover:text-secondary_dark"
                    href="/user/login">Login Here</a></p>
        </div>
        <div class="hidden lg:block w-2/5 flex-shrink-0 bg-primary">
            <img class="w-full h-full object-cover object-left"
                src="{{ asset('assets/frontend/images/mission_bg.png') }}" />
        </div>
    </div>
</body>

</html>
