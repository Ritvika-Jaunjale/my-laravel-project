@extends('layouts.app')
@section('content')
<a href="{{ url('/drives/'.$drive->id) }}" class="mb-6 inline-flex items-center gap-1 text-sm font-medium text-indigo-600 hover:text-indigo-800">
    &larr; Back to drive
</a>

<div class="mx-auto max-w-2xl rounded-xl border border-gray-200 bg-white shadow-sm">
    <div class="border-b border-gray-200 p-6">
        <h1 class="text-2xl font-semibold">Edit Placement Drive</h1>
        <p class="mt-1 text-sm text-gray-500">Update the details for {{ $drive->company }} &middot; {{ $drive->role }}.</p>
    </div>

    <form method="POST" action="{{ url('/drives/'.$drive->id) }}" class="space-y-5 p-6">
        @csrf
        @method('PUT')

        @include('drives.partials.form-fields', ['drive' => $drive])

        <div class="flex items-center justify-end gap-3 border-t border-gray-200 pt-5">
            <a href="{{ url('/drives/'.$drive->id) }}" class="rounded-lg px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100">Cancel</a>
            <button type="submit" class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700">
                Save Changes
            </button>
        </div>
    </form>
</div>
@endsection
