<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    public function index()
    {
        $lastActivity = Activity::orderBy('updated_at', 'desc')->get();
        return view('pages.activity', compact('lastActivity'));
    }
}
