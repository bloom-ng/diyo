<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Fleet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::with('fleet');

        // Search functionality
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('from', 'like', "%{$search}%")
                    ->orWhere('destination', 'like', "%{$search}%");
            });
        }

        // Filter by date
        if ($request->has('date')) {
            $query->whereDate('date', $request->date);
        }

        // Filter by fleet
        if ($request->has('fleet_id')) {
            $query->where('requested_fleet', $request->fleet_id);
        }

        $bookings = $query->latest()->paginate(10);
        $fleets = Fleet::all();

        return view('dashboard.bookings.index', compact('bookings', 'fleets'));
    }

    public function create()
    {
        $fleets = Fleet::all();
        return view('dashboard.bookings.create', compact('fleets'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'from' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'number_of_passengers' => 'required|integer|min:1',
            'requested_fleet' => 'required|exists:fleets,id',
            'return_or_one_way' => 'required|in:return,one_way',
        ]);

        if ($validator->fails()) {
            Log::error('Booking validation failed', ['errors' => $validator->errors()->all()]);
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();
        $data['time'] = $request->date . ' ' . $request->time;

        Booking::create($data);

        return redirect()->route('bookings.index')
            ->with('success', 'Booking created successfully.');
    }

    public function show(Booking $booking)
    {
        $booking->load('fleet');
        return view('dashboard.bookings.show', compact('booking'));
    }

    public function edit(Booking $booking)
    {
        $fleets = Fleet::all();
        return view('dashboard.bookings.edit', compact('booking', 'fleets'));
    }

    public function update(Request $request, Booking $booking)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'from' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'number_of_passengers' => 'required|integer|min:1',
            'requested_fleet' => 'required|exists:fleets,id',
            'return_or_one_way' => 'required|in:return,one_way',
        ]);

        if ($validator->fails()) {
            Log::error('Booking update validation failed', ['errors' => $validator->errors()->all()]);
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();
        $data['time'] = $request->date . ' ' . $request->time;

        $booking->update($data);

        return redirect()->route('bookings.index')
            ->with('success', 'Booking updated successfully.');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('bookings.index')
            ->with('success', 'Booking deleted successfully.');
    }
}
