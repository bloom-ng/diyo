@extends('layouts.admin-layout')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-[migateBold] text-gray-800">Blog Post Details</h1>
            <a href="{{ route('blogs.index') }}"
                class="bg-gray-500 text-white px-6 py-3 rounded-lg font-[markPro] hover:bg-gray-600 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i> Back to Posts
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            @if ($blog->featured_image)
                <div class="h-64 w-full">
                    <img src="{{ Storage::url($blog->featured_image) }}" alt="{{ $blog->title }}"
                        class="w-full h-full object-cover">
                </div>
            @endif

            <div class="p-6">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h2 class="text-3xl font-[migateBold] text-gray-900 mb-4">{{ $blog->title }}</h2>
                        <div class="flex items-center text-sm text-gray-500 font-[markPro]">
                            <span><i class="far fa-calendar-alt mr-2"></i>Created:
                                {{ $blog->created_at->format('M d, Y') }}</span>
                            <span class="mx-4">•</span>
                            <span><i class="far fa-clock mr-2"></i>Last updated:
                                {{ $blog->updated_at->format('M d, Y') }}</span>
                        </div>
                    </div>
                    <div class="flex space-x-4">
                        <a href="{{ route('blogs.edit', $blog) }}"
                            class="bg-[#039FC3] text-white px-6 py-3 rounded-lg font-[markPro] hover:bg-[#0287a3] transition-colors">
                            <i class="fas fa-edit mr-2"></i> Edit
                        </a>
                        <form action="{{ route('blogs.destroy', $blog) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 text-white px-6 py-3 rounded-lg font-[markPro] hover:bg-red-600 transition-colors"
                                onclick="return confirm('Are you sure you want to delete this post?')">
                                <i class="fas fa-trash mr-2"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>

                <div class="prose max-w-none font-[markPro] text-gray-700">
                    {!! $blog->content !!}
                </div>

                <div class="mt-8 pt-6 border-t border-gray-200">
                    <div class="flex items-center">
                        <span
                            class="px-3 py-1 inline-flex text-xs leading-5 font-[markPro] rounded-full {{ $blog->is_published ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                            <i class="fas {{ $blog->is_published ? 'fa-check-circle' : 'fa-clock' }} mr-2"></i>
                            {{ $blog->is_published ? 'Published' : 'Draft' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
