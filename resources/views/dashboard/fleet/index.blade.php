@extends('layouts.admin-layout')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-[migateBold] text-gray-800">Fleet Management</h1>
            <a href="{{ route('fleet.create') }}"
                class="bg-[#039FC3] text-white px-6 py-3 rounded-lg font-[markPro] hover:bg-[#0287a3] transition-colors">
                <i class="fas fa-plus mr-2"></i> Add New Fleet
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-6">
            <div class="p-6">
                <form action="{{ route('fleet.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1">
                        <div class="relative">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Search fleets..."
                                class="w-full px-4 py-2 pl-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#039FC3] font-[markPro]">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-48">
                        <select name="category"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#039FC3] font-[markPro]">
                            <option value="">All Categories</option>
                            @foreach ($categories as $value => $label)
                                <option value="{{ $value }}" {{ request('category') == $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <button type="submit"
                            class="bg-[#039FC3] text-white px-6 py-2 rounded-lg font-[markPro] hover:bg-[#0287a3] transition-colors">
                            <i class="fas fa-filter mr-2"></i> Filter
                        </button>
                    </div>
                </form>
            </div>
        </div>

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
                                    Category</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-[markProBold] text-gray-500 uppercase tracking-wider">
                                    Max Passengers</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-[markProBold] text-gray-500 uppercase tracking-wider">
                                    Miles</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-[markProBold] text-gray-500 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($fleets as $fleet)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap font-[markPro]">{{ $fleet->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap font-[markPro]">{{ ucfirst($fleet->category) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap font-[markPro]">{{ $fleet->maximum_passenger }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap font-[markPro]">
                                        {{ number_format($fleet->miles) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('fleet.show', $fleet) }}"
                                                class="bg-blue-500 text-white px-3 py-1 rounded-lg font-[markPro] hover:bg-blue-600 transition-colors">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('fleet.edit', $fleet) }}"
                                                class="bg-[#039FC3] text-white px-3 py-1 rounded-lg font-[markPro] hover:bg-[#0287a3] transition-colors">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('fleet.destroy', $fleet) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-500 text-white px-3 py-1 rounded-lg font-[markPro] hover:bg-red-600 transition-colors"
                                                    onclick="return confirm('Are you sure you want to delete this fleet?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center font-[markPro] text-gray-500">
                                        No fleets found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $fleets->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
