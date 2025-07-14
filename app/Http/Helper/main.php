<?php 

use App\Models\GeneralSetting;
use App\Models\Package;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;






function keywords(){

}

function permission($permission)
{
    $user = Auth::user();
    if ($user->can($permission)) {
        return true;
    }
    return false;
}

function getSettings($key)
{
    $dataTypes = Cache::remember('general_settings', 7*24*60, function () {
        return GeneralSetting::pluck('value', 'key')->toArray();
    });

    return $dataTypes[$key] ?? null;
}

function searchCategories()
{
    $packages = Package::with('plans')->get();
    
    return $packages;
}

function serviceCatagories()
{
    $categories = ServiceCategory::with('services')->latest()->get();
    
    return $categories;
}

function generateRatingIcons($rating) {
    $icons = '';

    // Full icons
    $fullStars = floor($rating);
    $icons .= str_repeat('<i class="fa-solid fa-star text-yellow-300"></i>', $fullStars);

    // Half icon
    if ($rating - $fullStars >= 0.5) {
        $icons .= '<i class="fa-solid fa-star-half-stroke text-yellow-300"></i>';
    }

    // Empty icons
    $emptyStars = 5 - ceil($rating);
    $icons .= str_repeat('<i class="fa-regular fa-star text-yellow-300"></i>', $emptyStars);

    return $icons;
}

// Time format
function timeAgo($timestamp) {
    $time = new DateTime($timestamp);
    $now = new DateTime();
    $interval = $now->diff($time);

    if ($interval->y >= 1) {
        return $interval->format('%yy ago');
    } elseif ($interval->m >= 1) {
        return $interval->format('%mm %dd ago');
    } elseif ($interval->d >= 1) {
        return $interval->format('%dd %hh ago');
    } elseif ($interval->h >= 1) {
        return $interval->format('%hh %im ago');
    } elseif ($interval->i >= 1) {
        return $interval->format('%im ago');
    } else {
        return $interval->format('%ss ago');
    }
}