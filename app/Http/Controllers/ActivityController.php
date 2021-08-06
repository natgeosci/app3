<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Provider;
use App\Models\Product;
use App\Models\Contract;

class ActivityController extends Controller
{
    public function index()
    {
        $lastActivity = Activity::orderBy('updated_at', 'desc')->get();
        return view('pages.activities.activity', compact('lastActivity'));
    }

    public function getContractActivity() 
    {
        $activities = Contract::getActivities();
        return view('pages.activities.list', compact('activities'));
    }

    public function getProductActivity() 
    {
        $activities = Product::getActivities();
        return view('pages.activities.list', compact('activities'));
    }

    public function getProviderActivity() 
    {
        $activities = Provider::getActivities();
        return view('pages.activities.list', compact('activities'));
    }
}
