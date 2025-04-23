@extends('layouts.admin-layout')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-[migateBold] text-gray-800">Dashboard Overview</h1>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Users Card -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-[markProBold] text-gray-500">Total Users</h3>
                            <p class="text-3xl font-[migateBold] text-gray-800 mt-2">{{ $metrics['users']['total'] }}</p>
                            <p class="text-sm font-[markPro] text-gray-500 mt-1">
                                +{{ $metrics['users']['recent'] }} this week
                            </p>
                        </div>
                        <div class="bg-[#039FC3] bg-opacity-10 p-2 rounded-full">
                            <i class="fas fa-users text-white text-2xl"></i>
                        </div>
                    </div>
                    @if ($metrics['users']['last_activity'])
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <p class="text-sm font-[markPro] text-gray-500">Last Activity</p>
                            <p class="text-sm font-[markPro] text-gray-800">{{ $metrics['users']['last_activity']->name }}
                            </p>
                            <p class="text-xs font-[markPro] text-gray-400">
                                {{ $metrics['users']['last_activity']->created_at->diffForHumans() }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Bookings Card -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-[markProBold] text-gray-500">Total Bookings</h3>
                            <p class="text-3xl font-[migateBold] text-gray-800 mt-2">{{ $metrics['bookings']['total'] }}</p>
                            <p class="text-sm font-[markPro] text-gray-500 mt-1">
                                +{{ $metrics['bookings']['recent'] }} this week
                            </p>
                        </div>
                        <div class="bg-[#039FC3] bg-opacity-10 p-2 rounded-full">
                            <i class="fas fa-calendar-check text-white text-2xl"></i>
                        </div>
                    </div>
                    @if ($metrics['bookings']['last_activity'])
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <p class="text-sm font-[markPro] text-gray-500">Last Booking</p>
                            <p class="text-sm font-[markPro] text-gray-800">
                                {{ $metrics['bookings']['last_activity']->name }}</p>
                            <p class="text-xs font-[markPro] text-gray-400">
                                {{ $metrics['bookings']['last_activity']->created_at->diffForHumans() }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Fleet Card -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-[markProBold] text-gray-500">Total Fleet</h3>
                            <p class="text-3xl font-[migateBold] text-gray-800 mt-2">{{ $metrics['fleet']['total'] }}</p>
                        </div>
                        <div class="bg-[#039FC3] bg-opacity-10 p-2 rounded-full">
                            <i class="fas fa-plane text-white text-2xl"></i>
                        </div>
                    </div>
                    @if ($metrics['fleet']['last_activity'])
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <p class="text-sm font-[markPro] text-gray-500">Last Added</p>
                            <p class="text-sm font-[markPro] text-gray-800">{{ $metrics['fleet']['last_activity']->name }}
                            </p>
                            <p class="text-xs font-[markPro] text-gray-400">
                                {{ $metrics['fleet']['last_activity']->created_at->diffForHumans() }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Contacts Card -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-[markProBold] text-gray-500">Contact Messages</h3>
                            <p class="text-3xl font-[migateBold] text-gray-800 mt-2">{{ $metrics['contacts']['total'] }}
                            </p>
                            <p class="text-sm font-[markPro] text-gray-500 mt-1">
                                +{{ $metrics['contacts']['recent'] }} this week
                            </p>
                        </div>
                        <div class="bg-[#039FC3] bg-opacity-10 p-2 rounded-full">
                            <i class="fas fa-envelope text-white text-2xl"></i>
                        </div>
                    </div>
                    @if ($metrics['contacts']['last_activity'])
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <p class="text-sm font-[markPro] text-gray-500">Last Message</p>
                            <p class="text-sm font-[markPro] text-gray-800">
                                {{ $metrics['contacts']['last_activity']->name }}</p>
                            <p class="text-xs font-[markPro] text-gray-400">
                                {{ $metrics['contacts']['last_activity']->created_at->diffForHumans() }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Newsletter Card -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-[markProBold] text-gray-500">Newsletter Subscribers</h3>
                            <p class="text-3xl font-[migateBold] text-gray-800 mt-2">{{ $metrics['newsletters']['total'] }}
                            </p>
                            <p class="text-sm font-[markPro] text-gray-500 mt-1">
                                +{{ $metrics['newsletters']['recent'] }} this week
                            </p>
                        </div>
                        <div class="bg-[#039FC3] bg-opacity-10 p-2 rounded-full">
                            <i class="fas fa-newspaper text-white text-2xl"></i>
                        </div>
                    </div>
                    @if ($metrics['newsletters']['last_activity'])
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <p class="text-sm font-[markPro] text-gray-500">Last Subscriber</p>
                            <p class="text-sm font-[markPro] text-gray-800">
                                {{ $metrics['newsletters']['last_activity']->email }}</p>
                            <p class="text-xs font-[markPro] text-gray-400">
                                {{ $metrics['newsletters']['last_activity']->created_at->diffForHumans() }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Blog Card -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-[markProBold] text-gray-500">Blog Posts</h3>
                            <p class="text-3xl font-[migateBold] text-gray-800 mt-2">{{ $metrics['blog']['total'] }}</p>
                            <p class="text-sm font-[markPro] text-gray-500 mt-1">
                                +{{ $metrics['blog']['recent'] }} this week
                            </p>
                        </div>
                        <div class="bg-[#039FC3] bg-opacity-10 p-2 rounded-full">
                            <i class="fas fa-blog text-white text-2xl"></i>
                        </div>
                    </div>
                    @if ($metrics['blog']['last_activity'])
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <p class="text-sm font-[markPro] text-gray-500">Last Post</p>
                            <p class="text-sm font-[markPro] text-gray-800">{{ $metrics['blog']['last_activity']->title }}
                            </p>
                            <p class="text-xs font-[markPro] text-gray-400">
                                {{ $metrics['blog']['last_activity']->created_at->diffForHumans() }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
