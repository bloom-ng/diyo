<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\Fleet;
use App\Models\Contact;
use App\Models\Newsletter;
use App\Models\Blog;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Basic counts
        $metrics = [
            'users' => [
                'total' => User::count(),
                'recent' => User::where('created_at', '>=', Carbon::now()->subDays(7))->count(),
                'last_activity' => User::latest()->first(),
            ],
            'bookings' => [
                'total' => Booking::count(),
                'recent' => Booking::where('created_at', '>=', Carbon::now()->subDays(7))->count(),
                'last_activity' => Booking::with('fleet')->latest()->first(),
            ],
            'fleet' => [
                'total' => Fleet::count(),
                'by_category' => Fleet::groupBy('category')->selectRaw('category, count(*) as total')->get(),
                'last_activity' => Fleet::latest()->first(),
            ],
            'contacts' => [
                'total' => Contact::count(),
                'recent' => Contact::where('created_at', '>=', Carbon::now()->subDays(7))->count(),
                'last_activity' => Contact::latest()->first(),
            ],
            'newsletters' => [
                'total' => Newsletter::count(),
                'recent' => Newsletter::where('created_at', '>=', Carbon::now()->subDays(7))->count(),
                'last_activity' => Newsletter::latest()->first(),
            ],
            'blog' => [
                'total' => Blog::count(),
                'recent' => Blog::where('created_at', '>=', Carbon::now()->subDays(7))->count(),
                'last_activity' => Blog::latest()->first(),
            ],
        ];

        return view('dashboard.index', compact('metrics'));
    }
}
