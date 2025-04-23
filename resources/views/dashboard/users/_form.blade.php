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
    <label for="name" class="block text-sm font-[markProBold] text-gray-700 mb-2">Name</label>
    <input type="text"
        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#039FC3] @error('name') border-red-500 @enderror"
        id="name" name="name" value="{{ old('name', $user->name ?? '') }}" required>
    @error('name')
        <p class="mt-1 text-sm text-red-600 font-[markPro]">{{ $message }}</p>
    @enderror
</div>

<div class="mb-6">
    <label for="email" class="block text-sm font-[markProBold] text-gray-700 mb-2">Email</label>
    <input type="email"
        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#039FC3] @error('email') border-red-500 @enderror"
        id="email" name="email" value="{{ old('email', $user->email ?? '') }}" required>
    @error('email')
        <p class="mt-1 text-sm text-red-600 font-[markPro]">{{ $message }}</p>
    @enderror
</div>

<div class="mb-6">
    <label for="password" class="block text-sm font-[markProBold] text-gray-700 mb-2">Password</label>
    <input type="password"
        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#039FC3] @error('password') border-red-500 @enderror"
        id="password" name="password" {{ isset($user) ? '' : 'required' }}>
    @error('password')
        <p class="mt-1 text-sm text-red-600 font-[markPro]">{{ $message }}</p>
    @enderror
    @if (isset($user))
        <p class="mt-1 text-sm text-gray-500 font-[markPro]">Leave blank to keep current password</p>
    @endif
</div>

<div class="mb-6">
    <label for="password_confirmation" class="block text-sm font-[markProBold] text-gray-700 mb-2">Confirm
        Password</label>
    <input type="password"
        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#039FC3] @error('password_confirmation') border-red-500 @enderror"
        id="password_confirmation" name="password_confirmation" {{ isset($user) ? '' : 'required' }}>
    @error('password_confirmation')
        <p class="mt-1 text-sm text-red-600 font-[markPro]">{{ $message }}</p>
    @enderror
</div>
