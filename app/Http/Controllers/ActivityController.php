<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    public function index()
    {
        $lastActivity = Activity::orderBy('updated_at', 'desc')->get();
        return view('pages.activities.activity', compact('lastActivity'));
    } 

    // public function getActivity(string $model_type) 
    // {
    //     switch ($model_type) {
    //         case 'contract':
    //             $activities = Contract::getActivities();
    //             break;
            
    //         case 'product':
    //             $activities = Product::getActivities();
    //             break;

    //         case 'provider':
    //             $activities = Provider::getActivities();
    //             break;

    //         default:
    //             abort(404);
    //             break;
    //     }
    //     return view('pages.activities.list', compact('activities'));
    // }

    public function getActivity(string $model_type) 
    {
        $model_type = ucfirst($model_type);
        abort_if(!class_exists("App\\Models\\$model_type"), 404);
        $activities = "App\\Models\\$model_type"::getActivities();

        return view('pages.activities.list', compact('activities'));
    }
}
