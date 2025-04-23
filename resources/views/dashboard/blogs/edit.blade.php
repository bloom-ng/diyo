@extends('layouts.admin-layout')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-[migateBold] text-gray-800">Edit Blog Post</h1>
            <a href="{{ route('blogs.index') }}"
                class="bg-gray-500 text-white px-6 py-3 rounded-lg font-[markPro] hover:bg-gray-600 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i> Back to Posts
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6">
            <form action="{{ route('blogs.update', $blog) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="title" class="block text-gray-700 text-sm font-[markProBold] mb-2">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $blog->title) }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#039FC3] font-[markPro] @error('title') border-red-500 @enderror">
                    @error('title')
                        <p class="text-red-500 text-xs font-[markPro] mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="content" class="block text-gray-700 text-sm font-[markProBold] mb-2">Content</label>
                    <textarea name="content" id="content" rows="10"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#039FC3] font-[markPro] @error('content') border-red-500 @enderror">{{ old('content', $blog->content) }}</textarea>
                    @error('content')
                        <p class="text-red-500 text-xs font-[markPro] mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="featured_image" class="block text-gray-700 text-sm font-[markProBold] mb-2">Featured
                        Image</label>
                    @if ($blog->featured_image)
                        <div class="mb-4">
                            <img src="{{ Storage::url($blog->featured_image) }}" alt="Current featured image"
                                class="h-32 w-auto object-cover rounded-lg">
                        </div>
                    @endif
                    <input type="file" name="featured_image" id="featured_image"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#039FC3] font-[markPro] @error('featured_image') border-red-500 @enderror">
                    @error('featured_image')
                        <p class="text-red-500 text-xs font-[markPro] mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_published" value="1"
                            {{ old('is_published', $blog->is_published) ? 'checked' : '' }}
                            class="form-checkbox h-5 w-5 text-[#039FC3] rounded focus:ring-[#039FC3]">
                        <span class="ml-2 text-gray-700 font-[markPro]">Publish immediately</span>
                    </label>
                </div>

                <div class="flex items-center justify-end">
                    <button type="submit"
                        class="bg-[#039FC3] text-white px-6 py-3 rounded-lg font-[markPro] hover:bg-[#0287a3] transition-colors">
                        <i class="fas fa-save mr-2"></i> Update Post
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.tiny.cloud/1/{{ env('TINY_MCE_KEY') }}/tinymce/6/tinymce.min.js" referrerpolicy="origin">
    </script>
    <script>
        tinymce.init({
            selector: '#content',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            height: 500,
            images_upload_url: '/upload',
            automatic_uploads: true,
            file_picker_types: 'image',
            images_upload_handler: function(blobInfo, progress) {
                return new Promise((resolve, reject) => {
                    const formData = new FormData();
                    formData.append('file', blobInfo.blob(), blobInfo.filename());

                    fetch('/upload', {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content')
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            resolve(result.location);
                        })
                        .catch(error => {
                            reject('Upload failed');
                        });
                });
            }
        });
    </script>
@endsection
