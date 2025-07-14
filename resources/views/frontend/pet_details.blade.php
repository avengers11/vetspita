@extends('frontend.layout')

@section('title', 'My Pets')

@section('content')
    <div>
        <div class="p-16 sm:p-28 bg-secondary/20 flex flex-col items-center">
            <h1 class="text-5xl font-medium mb-7 text-center leading-snug">Pet Profile</h1>

            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="/"
                            class="inline-flex items-center text-sm font-medium group text-secondary_dark hover:text-secondary dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 me-2.5 fill-secondary_dark group-hover:fill-secondary" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-secondary_dark mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <a href="/add-pet"
                                class="ms-1 text-sm font-medium text-secondary_dark hover:text-secondary md:ms-2">Details</a>
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
                                    <path d="M12 16C13.6569 16 15 14.6569 15 13C15 11.3431 13.6569 10 12 10C10.3431 10 9 11.3431 9 13C9 14.6569 10.3431 16 12 16Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M3 16.8V9.2C3 8.0799 3 7.51984 3.21799 7.09202C3.40973 6.71569 3.71569 6.40973 4.09202 6.21799C4.51984 6 5.0799 6 6.2 6H7.25464C7.37758 6 7.43905 6 7.49576 5.9935C7.79166 5.95961 8.05705 5.79559 8.21969 5.54609C8.25086 5.49827 8.27836 5.44328 8.33333 5.33333C8.44329 5.11342 8.49827 5.00346 8.56062 4.90782C8.8859 4.40882 9.41668 4.08078 10.0085 4.01299C10.1219 4 10.2448 4 10.4907 4H13.5093C13.7552 4 13.8781 4 13.9915 4.01299C14.5833 4.08078 15.1141 4.40882 15.4394 4.90782C15.5017 5.00345 15.5567 5.11345 15.6667 5.33333C15.7216 5.44329 15.7491 5.49827 15.7803 5.54609C15.943 5.79559 16.2083 5.95961 16.5042 5.9935C16.561 6 16.6224 6 16.7454 6H17.8C18.9201 6 19.4802 6 19.908 6.21799C20.2843 6.40973 20.5903 6.71569 20.782 7.09202C21 7.51984 21 8.0799 21 9.2V16.8C21 17.9201 21 18.4802 20.782 18.908C20.5903 19.2843 20.2843 19.5903 19.908 19.782C19.4802 20 18.9201 20 17.8 20H6.2C5.0799 20 4.51984 20 4.09202 19.782C3.71569 19.5903 3.40973 19.2843 3.21799 18.908C3 18.4802 3 17.9201 3 16.8Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                            </svg>
                            <input class="hidden" type="file" name="image" id="image">
                        </label>
                        <img class="w-48 rounded-full border-4 border-secondary_dark p-5"  src="{{ Storage::url($pet->image) }}" alt="">
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-5">
                    <div class="flex flex-col">
                        <label for="species" class="uppercase mb-2 font-medium text-secondary_dark">Selcet Species</label>
                        <select name="species" id="species" class="border border-transparent outline-none focus:border focus:border-secondary focus:outline-none focus:ring-0 focus:shadow-none w-full p-4 bg-secondary/20" required>
                            <option value="">Select pet species</option>
                            @foreach ($species as $item)
                                <option @if($pet->species == $item->name) selected @endif value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col col-span-2">
                        <label for="pet_name" class="uppercase mb-2 font-medium text-secondary_dark">Pet Name</label>
                        <input type="text" name="name" value="{{ $pet->name }}" id="pet_name" placeholder="Type Pet Name" class="border border-transparent outline-none focus:border focus:border-secondary focus:outline-none focus:ring-0 focus:shadow-none w-full p-4 bg-secondary/20" required>
                    </div>
                    <div class="flex flex-col">
                        <label for="breed" class="uppercase mb-2 font-medium text-secondary_dark">Breed</label>
                        <input type="text" name="breed" value="{{ $pet->breed }}" id="breed" placeholder="Type Pet Breed" class="border border-transparent outline-none focus:border focus:border-secondary focus:outline-none focus:ring-0 focus:shadow-none w-full p-4 bg-secondary/20">
                    </div>
                    <div class="flex flex-col">
                        <label for="age" class="uppercase mb-2 font-medium text-secondary_dark">Age (Years)</label>
                        <input type="number" name="age_year" value="{{ $years }}" id="age" placeholder="Type Age" class="border border-transparent outline-none focus:border focus:border-secondary focus:outline-none focus:ring-0 focus:shadow-none w-full p-4 bg-secondary/20">
                    </div>
                    <div class="flex flex-col">
                        <label for="age" class="uppercase mb-2 font-medium text-secondary_dark">Age (Months)</label>
                        <input type="number" name="age_month" value="{{ $months }}" id="age" placeholder="Type Age" class="border border-transparent outline-none focus:border focus:border-secondary focus:outline-none focus:ring-0 focus:shadow-none w-full p-4 bg-secondary/20">
                    </div>

                    <div class="flex flex-col">
                        <label for="sex" class="uppercase mb-2 font-medium text-secondary_dark">Sex</label>
                        <select name="sex" id="sex"
                            class="border border-transparent outline-none focus:border focus:border-secondary focus:outline-none focus:ring-0 focus:shadow-none w-full p-4 bg-secondary/20">
                            <option value="Male" @if($pet->sex == "Male") selected @endif>Male</option>
                            <option value="Female" @if($pet->sex == "Female") selected @endif>Female</option>
                        </select>
                    </div>
                    <div class="flex flex-col">
                        <label for="vaccinated" class="uppercase mb-2 font-medium text-secondary_dark">Vaccinated</label>
                        <div class="flex items-center gap-10 py-4">
                            <div class="flex items-center">
                                <input @if($pet->vaccinated == "1") checked @endif id="vaccinated_true" type="radio" value="1" name="vaccinated" class="w-4 h-4 text-secondary_dark bg-gray-100 border-gray-300 focus:ring-secondary_dark focus:ring-2">
                                <label for="vaccinated_true" class="ms-2 text-sm font-medium text-gray-400 dark:text-gray-500">Yes</label>
                            </div>
                            <div class="flex items-center">
                                <input @if($pet->vaccinated == "0") checked @endif id="vaccinated_false" type="radio" value="0" name="vaccinated" class="w-4 h-4 text-secondary_dark bg-gray-100 border-gray-300 focus:ring-secondary_dark focus:ring-2">
                                <label for="vaccinated_false" class="ms-2 text-sm font-medium text-gray-400 dark:text-gray-500">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <label for="vaccine_date" class="uppercase mb-2 font-medium text-secondary_dark">Vaccine Date</label>
                        <input type="date" name="vaccine_date" value="{{ $pet->vaccine_date }}" id="vaccine_date" class="border border-transparent outline-none focus:border focus:border-secondary focus:outline-none focus:ring-0 focus:shadow-none w-full p-4 bg-secondary/20">
                    </div>
                </div>
                <button type="submit"
                    class="border-2 bg-secondary_dark border-secondary_dark transition-all duration-300 uppercase hover:bg-secondary_dark hover:border-secondary_dark text-white font text-sm px-7 py-3 focus:outline-none tracking-widest">
                    Submit
                </button>
            </div>
        </form>
    </div>
@endsection
