<?php

namespace App\Http\Controllers;

use App\Models\Fleet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class FleetController extends Controller
{
    public function index(Request $request)
    {
        $query = Fleet::query();

        // Search functionality
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('maximum_passenger', 'like', "%{$search}%")
                    ->orWhere('miles', 'like', "%{$search}%");
            });
        }

        // Category filter
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }

        $fleets = $query->latest()->paginate(10);
        $categories = [
            'light' => 'Light',
            'mid' => 'Mid',
            'super' => 'Super',
            'heavy' => 'Heavy',
            'long_range' => 'Long Range',
            'commercial' => 'Commercial',
            'turboprop' => 'Turboprop',
        ];

        return view('dashboard.fleet.index', compact('fleets', 'categories'));
    }

    public function create()
    {
        return view('dashboard.fleet.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'maximum_passenger' => 'required|integer|min:1',
            'miles' => 'required|integer|min:0',
            'category' => 'required|in:light,mid,super,heavy,long_range,commercial,turboprop',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        if ($validator->fails()) {
            Log::error('Validation failed', ['errors' => $validator->errors()->all()]);
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            try {
                $data['image'] = $request->file('image')->store('fleets', 'public');
            } catch (\Exception $e) {
                Log::error('Image upload error', ['error' => $e->getMessage()]);
                return redirect()->back()
                    ->with('error', 'An error occurred while uploading the image. Please try again.')
                    ->withInput();
            }
        }

        Fleet::create($data);

        return redirect()->route('fleet.index')
            ->with('success', 'Fleet created successfully.');
    }

    public function show(Fleet $fleet)
    {
        return view('dashboard.fleet.show', compact('fleet'));
    }

    public function edit(Fleet $fleet)
    {
        return view('dashboard.fleet.edit', compact('fleet'));
    }

    public function update(Request $request, Fleet $fleet)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'maximum_passenger' => 'required|integer|min:1',
            'miles' => 'required|integer|min:0',
            'category' => 'required|in:light,mid,super,heavy,long_range,commercial,turboprop',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        if ($validator->fails()) {
            Log::error('Validation failed', ['errors' => $validator->errors()->all()]);
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            try {
                // Delete old image if exists
                if ($fleet->image) {
                    Storage::delete('public/' . $fleet->image);
                }

                $data['image'] = $request->file('image')->store('fleets', 'public');
            } catch (\Exception $e) {
                Log::error('Image upload error', ['error' => $e->getMessage()]);
                return redirect()->back()
                    ->with('error', 'An error occurred while uploading the image. Please try again.')
                    ->withInput();
            }
        }

        $fleet->update($data);

        return redirect()->route('fleet.index')
            ->with('success', 'Fleet updated successfully.');
    }

    public function destroy(Fleet $fleet)
    {
        // Delete image if exists
        if ($fleet->image) {
            Storage::delete('public/' . $fleet->image);
        }

        $fleet->delete();

        return redirect()->route('fleet.index')
            ->with('success', 'Fleet deleted successfully.');
    }
}
