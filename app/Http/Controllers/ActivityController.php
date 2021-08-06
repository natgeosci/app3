<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Provider;

class ActivityController extends Controller
{
    public function index()
    {
        $lastActivity = Activity::orderBy('updated_at', 'desc')->get();
        // $activities = Activity::with('contracts')->get();
        // foreach ($activities as $a) 
        // {
        //     dd($a);
        // }
        return view('pages.activity', compact('lastActivity'));
    }
}
