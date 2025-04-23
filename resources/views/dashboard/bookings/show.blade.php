@extends('layouts.admin-layout')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-[migateBold] text-gray-800">Booking Details</h1>
            <a href="{{ route('bookings.index') }}"
                class="bg-[#039FC3] text-white px-6 py-3 rounded-lg font-[markPro] hover:bg-[#0287a3] transition-colors">
                <i class="fas fa-arrow-left mr-2"></i> Back to List
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Customer Information -->
                    <div class="space-y-6">
                        <h2 class="text-lg font-[markProBold] text-gray-800 border-b pb-2">Customer Information</h2>
                        <div>
                            <h3 class="text-sm font-[markProBold] text-gray-500">Name</h3>
                            <p class="mt-1 font-[markPro]">{{ $booking->name }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-[markProBold] text-gray-500">Email</h3>
                            <p class="mt-1 font-[markPro]">{{ $booking->email }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-[markProBold] text-gray-500">Phone</h3>
                            <p class="mt-1 font-[markPro]">{{ $booking->phone }}</p>
                        </div>
                    </div>

                    <!-- Trip Information -->
                    <div class="space-y-6">
                        <h2 class="text-lg font-[markProBold] text-gray-800 border-b pb-2">Trip Information</h2>
                        <div>
                            <h3 class="text-sm font-[markProBold] text-gray-500">From</h3>
                            <p class="mt-1 font-[markPro]">{{ $booking->from }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-[markProBold] text-gray-500">Destination</h3>
                            <p class="mt-1 font-[markPro]">{{ $booking->destination }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-[markProBold] text-gray-500">Date & Time</h3>
                            <p class="mt-1 font-[markPro]">
                                {{ \Carbon\Carbon::parse($booking->date)->format('M d, Y') }} at
                                {{ \Carbon\Carbon::parse($booking->time)->format('h:i A') }}
                            </p>
                        </div>
                        <div>
                            <h3 class="text-sm font-[markProBold] text-gray-500">Trip Type</h3>
                            <p class="mt-1">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-[markPro] rounded-full 
                                    {{ $booking->return_or_one_way === 'return' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                                    {{ ucfirst($booking->return_or_one_way) }}
                                </span>
                            </p>
                        </div>
                    </div>

                    <!-- Vehicle Information -->
                    <div class="space-y-6">
                        <h2 class="text-lg font-[markProBold] text-gray-800 border-b pb-2">Vehicle Information</h2>
                        <div>
                            <h3 class="text-sm font-[markProBold] text-gray-500">Selected Fleet</h3>
                            <p class="mt-1 font-[markPro]">{{ $booking->fleet->name }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-[markProBold] text-gray-500">Number of Passengers</h3>
                            <p class="mt-1 font-[markPro]">{{ $booking->number_of_passengers }}</p>
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <div class="space-y-6">
                        <h2 class="text-lg font-[markProBold] text-gray-800 border-b pb-2">Additional Information</h2>
                        <div>
                            <h3 class="text-sm font-[markProBold] text-gray-500">Created At</h3>
                            <p class="mt-1 font-[markPro]">
                                {{ \Carbon\Carbon::parse($booking->created_at)->format('Y-m-d H:i:s') }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-[markProBold] text-gray-500">Last Updated</h3>
                            <p class="mt-1 font-[markPro]">
                                {{ \Carbon\Carbon::parse($booking->updated_at)->format('Y-m-d H:i:s') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                {{-- <div class="mt-8 pt-6 border-t">
                    <div class="flex space-x-4">
                        <a href="{{ route('bookings.edit', $booking) }}"
                            class="bg-[#039FC3] text-white px-6 py-2 rounded-lg font-[markPro] hover:bg-[#0287a3] transition-colors">
                            <i class="fas fa-edit mr-2"></i> Edit Booking
                        </a>
                        <form action="{{ route('bookings.destroy', $booking) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-600 text-white px-6 py-2 rounded-lg font-[markPro] hover:bg-red-700 transition-colors"
                                onclick="return confirm('Are you sure you want to delete this booking?')">
                                <i class="fas fa-trash mr-2"></i> Delete Booking
                            </button>
                        </form>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
