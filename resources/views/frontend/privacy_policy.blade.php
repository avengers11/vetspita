@extends('frontend.layout')

@section('title', 'Privacy Policy')

@section('css')
    <style>
        .description {
            line-height: 2;
            font-weight: 500;
            font-family: "Inter", serif;
        }

        .description p,
        .description span {
            color: rgba(28, 29, 33, 0.6);
            font-family: "Inter", serif;
        }

        .description a {
            color: rgb(93, 192, 163) !important;
        }

        .description h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: rgb(28, 29, 33) !important;
            font-weight: 500;
        }
    </style>
@endsection

@section('content')
    <div>
        <div class="p-16 sm:p-28 bg-secondary/20 flex flex-col items-center">
            <h1 class="text-5xl font-medium mb-7 text-center leading-snug">Privacy Policy</h1>

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
                            <a href="/privacy-policy"
                                class="ms-1 text-sm font-medium text-secondary_dark hover:text-secondary md:ms-2">Privacy
                                Policy</a>
                        </div>
                    </li>
                </ol>
            </nav>

        </div>
        <div class="description max-w-screen-2xl bg-white mx-auto py-28 px-10 space-y-10">
            Privacy Policy

            Effective Date: 01/02/2025
            Last Updated: 01/03/2025

            At Vetspital, we value your privacy. This Privacy Policy explains how we collect, use, and protect your
            information when you visit our website, book appointments, or engage with our services.

            Information We Collect

            Personal details (name, email, phone number) when you book appointments or sign up for our services.

            Pet-related information for medical history and treatment purposes.

            Website usage data through cookies to improve user experience.


            How We Use Your Information

            To schedule and manage appointments.

            To provide medical records and pet care history.

            To improve our website functionality and customer service.

            To send important updates regarding your pet’s healthcare.


            Data Protection & Security

            We implement strict security measures to protect your data. Your personal information will never be sold or
            shared with third parties without consent, except as required by law.

            User Rights

            You have the right to request access, modification, or deletion of your personal data. Contact us at
            info.vetspital@gmail.com and info@vetspital.com for any privacy-related concerns.

        </div>
    </div>
@endsection
