<?php

namespace App\Http\Controllers;

use App\Models\Fleet;
use App\Models\Blog;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        // Get all fleets for the carousel
        $fleets = Fleet::all();
        $totalFleets = $fleets->count();

        // Get published blogs
        $blogs = Blog::where('is_published', true)
            ->latest()
            ->take(3)
            ->get();

        // Check if we should show the "Show Fleet" button (after 5 fleets)
        $showFleetButton = $totalFleets > 5;

        return view('welcome', compact('fleets', 'showFleetButton', 'blogs'));
    }
}
