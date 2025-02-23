<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;

class PageController extends Controller
{
    public function home()
    {
        $cars = Car::where('availability', true)->get();
        return view('frontend.home', compact('cars'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }
}
