@extends('layouts.admin-layout')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-[migateBold] text-gray-800">Admins</h1>
            <a href="{{ route('users.create') }}"
                class="bg-[#039FC3] text-white px-6 py-3 rounded-lg font-[markPro] hover:bg-[#0287a3] transition-colors">
                <i class="fas fa-plus mr-2"></i> Add New Admin
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-6">
            <div class="p-6">
                <form action="{{ route('users.index') }}" method="GET" class="flex gap-4">
                    <div class="flex-1">
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Search by name or email..."
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#039FC3]">
                    </div>
                    <button type="submit"
                        class="bg-[#039FC3] text-white px-6 py-2 rounded-lg font-[markPro] hover:bg-[#0287a3] transition-colors">
                        <i class="fas fa-search mr-2"></i> Search
                    </button>
                    @if (request('search'))
                        <a href="{{ route('users.index') }}"
                            class="bg-gray-500 text-white px-6 py-2 rounded-lg font-[markPro] hover:bg-gray-600 transition-colors">
                            <i class="fas fa-times mr-2"></i> Clear
                        </a>
                    @endif
                </form>
            </div>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-[markProBold] text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-[markProBold] text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-[markProBold] text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($users as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-[markPro] text-gray-900">{{ $user->name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-[markPro] text-gray-900">{{ $user->email }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-[markPro] text-gray-500">
                                    <div class="flex space-x-3">
                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="text-[#039FC3] hover:text-[#0287a3]">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900"
                                                onclick="return confirm('Are you sure you want to delete this user?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-center text-sm font-[markPro] text-gray-500">
                                    No users found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 bg-gray-50">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
