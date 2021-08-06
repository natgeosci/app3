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
        $provider = Provider::find(1);
        foreach ($provider->activities as $a) 
        {
            dd($a);
        }
        return view('pages.activity', compact('lastActivity'));
    }
}
