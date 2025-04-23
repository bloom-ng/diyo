@extends('layouts.admin-layout')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-[migateBold] text-gray-800">Contact Message Details</h1>
            <a href="{{ route('contacts.index') }}"
                class="bg-[#039FC3] text-white px-6 py-3 rounded-lg font-[markPro] hover:bg-[#0287a3] transition-colors">
                <i class="fas fa-arrow-left mr-2"></i> Back to List
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="p-6">
                <div class="space-y-6">
                    <div>
                        <h3 class="text-sm font-[markProBold] text-gray-500">Name</h3>
                        <p class="mt-1 font-[markPro]">{{ $contact->name }}</p>
                    </div>

                    <div>
                        <h3 class="text-sm font-[markProBold] text-gray-500">Email</h3>
                        <p class="mt-1 font-[markPro]">{{ $contact->email }}</p>
                    </div>

                    <div>
                        <h3 class="text-sm font-[markProBold] text-gray-500">Message</h3>
                        <p class="mt-1 font-[markPro] whitespace-pre-wrap">{{ $contact->message }}</p>
                    </div>

                    <div>
                        <h3 class="text-sm font-[markProBold] text-gray-500">Received At</h3>
                        <p class="mt-1 font-[markPro]">{{ $contact->created_at->format('Y-m-d H:i:s') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
