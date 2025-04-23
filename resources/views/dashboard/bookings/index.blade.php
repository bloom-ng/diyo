@extends('layouts.admin-layout')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-[migateBold] text-gray-800">Bookings</h1>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Search and Filter Form -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-6">
            <div class="p-6">
                <form action="{{ route('bookings.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <div class="relative">
                            <input type="text" name="search" id="search" value="{{ request('search') }}"
                                placeholder="Search bookings..."
                                class="w-full px-4 py-2 pl-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#039FC3] font-[markPro]">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                        </div>
                    </div>
                    <div>
                        <input type="date" name="date" id="date" value="{{ request('date') }}"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#039FC3] font-[markPro]">
                    </div>
                    <div>
                        <select name="fleet_id" id="fleet_id"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#039FC3] font-[markPro]">
                            <option value="">All Fleets</option>
                            @foreach ($fleets as $fleet)
                                <option value="{{ $fleet->id }}"
                                    {{ request('fleet_id') == $fleet->id ? 'selected' : '' }}>
                                    {{ $fleet->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="md:col-span-3">
                        <button type="submit"
                            class="bg-[#039FC3] text-white px-6 py-2 rounded-lg font-[markPro] hover:bg-[#0287a3] transition-colors">
                            <i class="fas fa-filter mr-2"></i> Apply Filters
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Bookings Table -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-[markProBold] text-gray-500 uppercase tracking-wider">
                                    Name</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-[markProBold] text-gray-500 uppercase tracking-wider">
                                    Email</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-[markProBold] text-gray-500 uppercase tracking-wider">
                                    Phone</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-[markProBold] text-gray-500 uppercase tracking-wider">
                                    From</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-[markProBold] text-gray-500 uppercase tracking-wider">
                                    Destination</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-[markProBold] text-gray-500 uppercase tracking-wider">
                                    Date & Time</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-[markProBold] text-gray-500 uppercase tracking-wider">
                                    Passengers</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-[markProBold] text-gray-500 uppercase tracking-wider">
                                    Fleet</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-[markProBold] text-gray-500 uppercase tracking-wider">
                                    Type</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-[markProBold] text-gray-500 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($bookings as $booking)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap font-[markPro]">{{ $booking->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap font-[markPro]">{{ $booking->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap font-[markPro]">{{ $booking->phone }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap font-[markPro]">{{ $booking->from }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap font-[markPro]">{{ $booking->destination }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap font-[markPro]">
                                        {{ \Carbon\Carbon::parse($booking->date)->format('M d, Y') }} at
                                        {{ \Carbon\Carbon::parse($booking->time)->format('h:i A') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap font-[markPro]">
                                        {{ $booking->number_of_passengers }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap font-[markPro]">{{ $booking->fleet->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-[markPro] rounded-full 
                                            {{ $booking->return_or_one_way === 'return' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                                            {{ ucfirst($booking->return_or_one_way) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('bookings.show', $booking) }}"
                                                class="bg-blue-500 text-white px-3 py-1 rounded-lg font-[markPro] hover:bg-blue-600 transition-colors">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('bookings.edit', $booking) }}"
                                                class="bg-yellow-500 text-white px-3 py-1 rounded-lg font-[markPro] hover:bg-yellow-600 transition-colors">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('bookings.destroy', $booking) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-500 text-white px-3 py-1 rounded-lg font-[markPro] hover:bg-red-600 transition-colors"
                                                    onclick="return confirm('Are you sure you want to delete this booking?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="px-6 py-4 text-center font-[markPro] text-gray-500">
                                        No bookings found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $bookings->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
