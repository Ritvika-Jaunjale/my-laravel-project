<div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
    <div>
        <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
        <input type="text" id="company" name="company" value="{{ old('company', $drive?->company) }}" required maxlength="255"
            class="mt-1 block w-full rounded-lg border px-3 py-2 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('company') border-red-500 @else border-gray-300 @enderror">
        @error('company')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
        <input type="text" id="role" name="role" value="{{ old('role', $drive?->role) }}" required maxlength="255"
            class="mt-1 block w-full rounded-lg border px-3 py-2 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('role') border-red-500 @else border-gray-300 @enderror">
        @error('role')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="package_lpa" class="block text-sm font-medium text-gray-700">Package (LPA)</label>
        <input type="number" id="package_lpa" name="package_lpa" value="{{ old('package_lpa', $drive?->package_lpa) }}" required min="0" max="99.99" step="0.01"
            class="mt-1 block w-full rounded-lg border px-3 py-2 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('package_lpa') border-red-500 @else border-gray-300 @enderror">
        @error('package_lpa')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="min_cgpa" class="block text-sm font-medium text-gray-700">Minimum CGPA</label>
        <input type="number" id="min_cgpa" name="min_cgpa" value="{{ old('min_cgpa', $drive?->min_cgpa) }}" required min="0" max="10" step="0.01"
            class="mt-1 block w-full rounded-lg border px-3 py-2 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('min_cgpa') border-red-500 @else border-gray-300 @enderror">
        @error('min_cgpa')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="sm:col-span-2">
        <label for="last_date" class="block text-sm font-medium text-gray-700">Last Date to Apply</label>
        <input type="date" id="last_date" name="last_date" value="{{ old('last_date', $drive?->last_date) }}" required @unless ($drive) min="{{ now()->toDateString() }}" @endunless
            class="mt-1 block w-full rounded-lg border px-3 py-2 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:w-1/2 @error('last_date') border-red-500 @else border-gray-300 @enderror">
        @error('last_date')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>
