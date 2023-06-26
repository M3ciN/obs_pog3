<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ObsPogController extends Controller
{
    public function index()
    {
        $services = Service::inRandomOrder()->limit(4)->get();
        return view('obs_pog.index', compact('services'));
    }

}

