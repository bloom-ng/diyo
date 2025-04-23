@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li class="font-[markPro]">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="mb-6">
    <label for="name" class="block text-sm font-[markProBold] text-gray-700 mb-2">Fleet Name</label>
    <input type="text"
        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#039FC3] @error('name') border-red-500 @enderror"
        id="name" name="name" value="{{ old('name', $fleet->name ?? '') }}" required>
    @error('name')
        <p class="mt-1 text-sm text-red-600 font-[markPro]">{{ $message }}</p>
    @enderror
</div>

<div class="mb-6">
    <label for="description" class="block text-sm font-[markProBold] text-gray-700 mb-2">Description</label>
    <textarea
        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#039FC3] @error('description') border-red-500 @enderror"
        id="description" name="description" rows="3" required>{{ old('description', $fleet->description ?? '') }}</textarea>
    @error('description')
        <p class="mt-1 text-sm text-red-600 font-[markPro]">{{ $message }}</p>
    @enderror
</div>

<div class="mb-6">
    <label for="maximum_passenger" class="block text-sm font-[markProBold] text-gray-700 mb-2">Maximum
        Passengers</label>
    <input type="number"
        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#039FC3] @error('maximum_passenger') border-red-500 @enderror"
        id="maximum_passenger" name="maximum_passenger"
        value="{{ old('maximum_passenger', $fleet->maximum_passenger ?? '') }}" required min="1">
    @error('maximum_passenger')
        <p class="mt-1 text-sm text-red-600 font-[markPro]">{{ $message }}</p>
    @enderror
</div>

<div class="mb-6">
    <label for="miles" class="block text-sm font-[markProBold] text-gray-700 mb-2">Miles</label>
    <input type="number"
        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#039FC3] @error('miles') border-red-500 @enderror"
        id="miles" name="miles" value="{{ old('miles', $fleet->miles ?? '') }}" required min="0">
    @error('miles')
        <p class="mt-1 text-sm text-red-600 font-[markPro]">{{ $message }}</p>
    @enderror
</div>

<div class="mb-6">
    <label for="category" class="block text-sm font-[markProBold] text-gray-700 mb-2">Category</label>
    <select
        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#039FC3] @error('category') border-red-500 @enderror"
        id="category" name="category" required>
        <option value="">Select Category</option>
        <option value="light" {{ old('category', $fleet->category ?? '') == 'light' ? 'selected' : '' }}>Light</option>
        <option value="mid" {{ old('category', $fleet->category ?? '') == 'mid' ? 'selected' : '' }}>Mid</option>
        <option value="super" {{ old('category', $fleet->category ?? '') == 'super' ? 'selected' : '' }}>Super
        </option>
        <option value="heavy" {{ old('category', $fleet->category ?? '') == 'heavy' ? 'selected' : '' }}>Heavy
        </option>
        <option value="long_range" {{ old('category', $fleet->category ?? '') == 'long_range' ? 'selected' : '' }}>Long
            Range</option>
        <option value="commercial" {{ old('category', $fleet->category ?? '') == 'commercial' ? 'selected' : '' }}>
            Commercial</option>
        <option value="turboprop" {{ old('category', $fleet->category ?? '') == 'turboprop' ? 'selected' : '' }}>
            Turboprop</option>
    </select>
    @error('category')
        <p class="mt-1 text-sm text-red-600 font-[markPro]">{{ $message }}</p>
    @enderror
</div>

<div class="mb-6">
    <label for="image" class="block text-sm font-[markProBold] text-gray-700 mb-2">Fleet Image</label>
    @if (isset($fleet) && $fleet->image)
        <div class="mb-4">
            <img src="{{ asset('storage/' . $fleet->image) }}" alt="{{ $fleet->name }}"
                class="w-48 h-48 object-cover rounded-lg">
        </div>
    @endif
    <input type="file"
        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#039FC3] @error('image') border-red-500 @enderror"
        id="image" name="image" accept="image/*">
    @error('image')
        <p class="mt-1 text-sm text-red-600 font-[markPro]">{{ $message }}</p>
    @enderror
    <p class="mt-1 text-sm text-gray-500 font-[markPro]">Upload a JPEG, PNG, JPG, or GIF image (max 5MB)</p>
</div>
