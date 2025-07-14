@extends('frontend.layout')

@section('title', 'My Profile')

@section('content')
    <div>
        <div class="p-16 sm:p-28 bg-primary/30 flex flex-col items-center">
            <h1 class="text-5xl font-medium mb-7 text-center leading-snug">My Profile</h1>

            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="/"
                            class="inline-flex items-center text-sm font-medium group text-primary_dark hover:text-secondary dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 me-2.5 fill-primary_dark group-hover:fill-secondary" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-primary_dark mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <a href="/profile"
                                class="ms-1 text-sm font-medium text-primary_dark hover:text-secondary md:ms-2">My
                                Profile</a>
                        </div>
                    </li>
                </ol>
            </nav>

        </div>
        <form action="" method="post" enctype="multipart/form-data">
            @csrf 
            
            <div class="max-w-screen-2xl bg-white mx-auto py-28 px-10 space-y-10">
                <div class="flex flex-col items-center gap-5">
                    <div class="relative">
                        <label for="image" class="absolute -bottom-2 -right-2 -translate-x-1/2 -translate-y-1/2 rounded-full p-2 bg-white/80 shadow-lg cursor-pointer">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M12 16C13.6569 16 15 14.6569 15 13C15 11.3431 13.6569 10 12 10C10.3431 10 9 11.3431 9 13C9 14.6569 10.3431 16 12 16Z"
                                        stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path
                                        d="M3 16.8V9.2C3 8.0799 3 7.51984 3.21799 7.09202C3.40973 6.71569 3.71569 6.40973 4.09202 6.21799C4.51984 6 5.0799 6 6.2 6H7.25464C7.37758 6 7.43905 6 7.49576 5.9935C7.79166 5.95961 8.05705 5.79559 8.21969 5.54609C8.25086 5.49827 8.27836 5.44328 8.33333 5.33333C8.44329 5.11342 8.49827 5.00346 8.56062 4.90782C8.8859 4.40882 9.41668 4.08078 10.0085 4.01299C10.1219 4 10.2448 4 10.4907 4H13.5093C13.7552 4 13.8781 4 13.9915 4.01299C14.5833 4.08078 15.1141 4.40882 15.4394 4.90782C15.5017 5.00345 15.5567 5.11345 15.6667 5.33333C15.7216 5.44329 15.7491 5.49827 15.7803 5.54609C15.943 5.79559 16.2083 5.95961 16.5042 5.9935C16.561 6 16.6224 6 16.7454 6H17.8C18.9201 6 19.4802 6 19.908 6.21799C20.2843 6.40973 20.5903 6.71569 20.782 7.09202C21 7.51984 21 8.0799 21 9.2V16.8C21 17.9201 21 18.4802 20.782 18.908C20.5903 19.2843 20.2843 19.5903 19.908 19.782C19.4802 20 18.9201 20 17.8 20H6.2C5.0799 20 4.51984 20 4.09202 19.782C3.71569 19.5903 3.40973 19.2843 3.21799 18.908C3 18.4802 3 17.9201 3 16.8Z"
                                        stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                            </svg>
                            <input class="hidden" type="file" name="image" id="image">
                        </label>
                        <img class="w-48 h-48 object-cover rounded-full border-4 border-primary_dark p-1"
                            src="{{ Storage::url($user->image) }}" alt="">
                    </div>
                    <div class="text-center space-y-3">
                        <h2 class="text-4xl font-semibold">{{ $user->name }}</h2>
                        <p class=" text-gray-500">Owner ID: {{ $user->user_id }}</p>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-5">
                    <div class="flex flex-col">
                        <label for="name" class="uppercase mb-2 font-medium text-primary_dark">Full Name</label>
                        <input type="text" name="name" id="name" placeholder="Your Name" value="{{ $user->name }}"
                            class="border border-transparent outline-none focus:border focus:border-primary_dark focus:outline-none focus:ring-0 focus:shadow-none w-full p-4 bg-primary_dark/20" required>
                    </div>
                    <div class="flex flex-col">
                        <label for="email" class="uppercase mb-2 font-medium text-primary_dark">Email Address</label>
                        <input type="email" name="email" id="email" value="{{ $user->email }}" placeholder="Your Email"
                            class="border border-transparent outline-none focus:border focus:border-primary_dark focus:outline-none focus:ring-0 focus:shadow-none w-full p-4 bg-primary_dark/20" required>
                    </div>
                    <div class="flex flex-col">
                        <label for="number" class="uppercase mb-2 font-medium text-primary_dark">Phone Number</label>
                        <input type="text" name="number" id="number" value="{{ $user->number }}" placeholder="Your Phone Number"
                            class="border border-transparent outline-none focus:border focus:border-primary_dark focus:outline-none focus:ring-0 focus:shadow-none w-full p-4 bg-primary_dark/20" required>
                    </div>
                    <div class="flex flex-col col-span-3">
                        <label for="address" class="uppercase mb-2 font-medium text-primary_dark">Address</label>
                        <input type="text" name="address" id="address" value="{{ $user->address }}" placeholder="Your address"
                            class="border border-transparent outline-none focus:border focus:border-primary_dark focus:outline-none focus:ring-0 focus:shadow-none w-full p-4 bg-primary_dark/20" required>
                    </div>
                </div>
                <button type="submit"
                    class="border-2 bg-primary_dark border-primary_dark transition-all duration-300 uppercase hover:bg-secondary_dark hover:border-secondary_dark text-white font text-sm px-7 py-3 focus:outline-none tracking-widest">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection
