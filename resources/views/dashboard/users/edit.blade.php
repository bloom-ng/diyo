@extends('layouts.admin-layout')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-[migateBold] text-gray-800">Edit User</h1>
            <a href="{{ route('users.index') }}"
                class="bg-gray-500 text-white px-6 py-3 rounded-lg font-[markPro] hover:bg-gray-600 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i> Back to List
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="p-6">
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('dashboard.users._form')
                    <div class="mt-6">
                        <button type="submit"
                            class="bg-[#039FC3] text-white px-6 py-3 rounded-lg font-[markPro] hover:bg-[#0287a3] transition-colors">
                            <i class="fas fa-save mr-2"></i> Update User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
