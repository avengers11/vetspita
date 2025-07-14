@extends('frontend.layout')

@section('title', 'Team Profile')

@section('content')
    <div id="profile-details" class="bg-gray-100">
        <div class="max-w-screen-2xl mx-auto py-10 space-y-5">
            <div class="flex justify-between items-center bg-white px-10 py-8 rounded">
                <div class="flex gap-5 items-center">
                    <img class="w-48 h-48 rounded-full object-cover object-top" src="{{ Storage::url($member->image) }}"
                        alt="">
                    <div class="my-5 space-y-2">
                        <h2 class="text-2xl font-semibold">{{ $member->name }}</h2>
                        <p class="text-gray-500">{{ $member->designation }}</p>
                        <p>{{ $member->address }}</p>
                    </div>
                </div>
                <div class="space-y-1">
                    <div class="flex items-center gap-2">
                        <img src="{{ asset('assets/frontend/icons/phone-call.png') }}" class="w-4 h-auto"
                            alt="Flowbite Logo" />
                        <p>{{ $member->phone }}</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-auto fill-primary">
                            <path
                                d="M64 112c-8.8 0-16 7.2-16 16l0 22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1l0-22.1c0-8.8-7.2-16-16-16L64 112zM48 212.2L48 384c0 8.8 7.2 16 16 16l384 0c8.8 0 16-7.2 16-16l0-171.8L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64l384 0c35.3 0 64 28.7 64 64l0 256c0 35.3-28.7 64-64 64L64 448c-35.3 0-64-28.7-64-64L0 128z" />
                        </svg>
                        <p>{{ $member->email }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white px-10 py-8 rounded">{!! $member->description !!}</div>
        </div>
    </div>
@endsection
