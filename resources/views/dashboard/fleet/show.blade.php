@extends('layouts.admin-layout')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-[migateBold] text-gray-800">Fleet Details: {{ $fleet->name }}</h1>
            <div class="flex space-x-4">
                <a href="{{ route('fleet.edit', $fleet) }}"
                    class="bg-[#039FC3] text-white px-6 py-3 rounded-lg font-[markPro] hover:bg-[#0287a3] transition-colors">
                    <i class="fas fa-edit mr-2"></i> Edit
                </a>
                <a href="{{ route('fleet.index') }}"
                    class="bg-gray-500 text-white px-6 py-3 rounded-lg font-[markPro] hover:bg-gray-600 transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i> Back to List
                </a>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h5 class="text-xl font-[markProBold] text-gray-800 mb-4">Basic Information</h5>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm font-[markProBold] text-gray-500">Name</p>
                                    <p class="font-[markPro] text-gray-800">{{ $fleet->name }}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-[markProBold] text-gray-500">Category</p>
                                    <p class="font-[markPro] text-gray-800">{{ ucfirst($fleet->category) }}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-[markProBold] text-gray-500">Maximum Passengers</p>
                                    <p class="font-[markPro] text-gray-800">{{ $fleet->maximum_passenger }}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-[markProBold] text-gray-500">Miles</p>
                                    <p class="font-[markPro] text-gray-800">{{ number_format($fleet->miles) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h5 class="text-xl font-[markProBold] text-gray-800 mb-4">Description</h5>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <p class="font-[markPro] text-gray-800">{{ $fleet->description }}</p>
                        </div>
                    </div>
                </div>

                @if ($fleet->image)
                    <div class="mt-8">
                        <h5 class="text-xl font-[markProBold] text-gray-800 mb-4">Fleet Image</h5>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <img src="{{ asset('storage/' . $fleet->image) }}" alt="{{ $fleet->name }}"
                                class="w-full max-w-md rounded-lg shadow-md">
                        </div>
                    </div>
                @endif

                <div class="mt-8">
                    <h5 class="text-xl font-[markProBold] text-gray-800 mb-4">Bookings</h5>
                    @if ($fleet->bookings->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-[markProBold] text-gray-500 uppercase tracking-wider">
                                            Booking ID</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-[markProBold] text-gray-500 uppercase tracking-wider">
                                            Status</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-[markProBold] text-gray-500 uppercase tracking-wider">
                                            Created At</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($fleet->bookings as $booking)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap font-[markPro]">{{ $booking->id }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap font-[markPro]">
                                                {{ ucfirst($booking->status) }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap font-[markPro]">
                                                {{ $booking->created_at->format('Y-m-d H:i:s') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="bg-blue-50 border border-blue-200 text-blue-700 px-4 py-3 rounded">
                            <p class="font-[markPro]">No bookings found for this fleet.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
