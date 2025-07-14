<?php

namespace Database\Seeders;

use App\Models\GeneralSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralSettings extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GeneralSetting::insert([
            // general 
            [
                "key" => "logo",
                "value" => "logo.png"
            ],
            [
                "key" => "favicon",
                "value" => "favicon.png"
            ],
            [
                "key" => "title",
                "value" => "Pet Care"
            ],
            [
                "key" => "meta_title",
                "value" => "Pet Care offers expert pet services including grooming, training, and health consultations for your beloved furry friends."
            ],
            [
                "key" => "meta_description",
                "value" => "Pet Care offers expert pet services including grooming, training, and health consultations for your beloved furry friends."
            ],
            [
                "key" => "meta_keywords",
                "value" => "Pet, Care, offers"
            ],
            [
                "key" => "cookies",
                "value" => ""
            ],
            [
                "key" => "privacy_policy",
                "value" => ""
            ],
            [
                "key" => "terms_condition",
                "value" => ""
            ],

            // custom code 
            [
                "key" => "custom_html",
                "value" => ""
            ],
            [
                "key" => "custom_css",
                "value" => ""
            ],
            [
                "key" => "custom_js",
                "value" => ""
            ],
            

            // Why Choose Us
            [
                "key" => "choose_us_consultation",
                "value" => "500"
            ],
            [
                "key" => "choose_us_surgery",
                "value" => "500"
            ],
            [
                "key" => "choose_us_online_consultation",
                "value" => "500"
            ],
            [
                "key" => "choose_us_diagnostic",
                "value" => "500"
            ],

            // Company details
            [
                "key" => "company_description",
                "value" => "Pet Care is a trusted provider of veterinary care, pet grooming, and training services. We are dedicated to providing your pets with the best possible care."
            ],
            [
                "key" => "company_number",
                "value" => "+123-456-7890"
            ],
            [
                "key" => "company_email",
                "value" => "contact@petcare.com"
            ],
            [
                "key" => "company_address",
                "value" => "contact@petcare.com"
            ],
            [
                "key" => "company_social_media_facebook",
                "value" => "https://www.facebook.com/petcare"
            ],
            [
                "key" => "company_social_media_twitter",
                "value" => "https://twitter.com/petcare"
            ],

            // about 
            [
                "key" => "about_title",
                "value" => "About Pet Care"
            ],
            [
                "key" => "about_cover",
                "value" => "about_cover.jpg"
            ],
            [
                "key" => "about_description",
                "value" => "At Pet Care, we are passionate about providing top-quality care for your pets. Our team is comprised of experienced professionals dedicated to ensuring the health and happiness of your animals."
            ]
        ]);
    }
}
