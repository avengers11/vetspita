<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultant;

class ConsultantController extends Controller
{
    //team
    public function team()
    {
        $members = Consultant::latest()->get();

        return view('frontend.our_team', compact('members'));
    }

    //teamView
    public function teamProfile(Consultant $member)
    {
        return view('frontend.our_team_profile', compact('member'));
    }
}
