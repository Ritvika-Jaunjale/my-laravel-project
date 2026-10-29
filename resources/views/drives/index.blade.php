@extends('layouts.app')
@section('content')
<div class="mb-6 flex items-center justify-between gap-4">
    <h1 class="text-2xl font-semibold">Placement Drives</h1>
    <a href="{{ url('/drives/create') }}" class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700">
        + New Drive
    </a>
</div>

<div class="overflow-x-auto rounded-lg border border-gray-200 bg-white shadow-sm">
    <table class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-gray-100 text-left font-medium text-gray-700">
            <tr>
                <th class="px-4 py-3">Company</th>
                <th class="px-4 py-3">Role</th>
                <th class="px-4 py-3 text-right">Package (LPA)</th>
                <th class="px-4 py-3 text-right">Min CGPA</th>
                <th class="px-4 py-3">Last Date</th>
                <th class="px-4 py-3"><span class="sr-only">Actions</span></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach ($drives as $drive)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 font-medium">
                        <a href="{{ url('/drives/'.$drive->id) }}" class="hover:text-indigo-600 hover:underline">{{ $drive->company }}</a>
                    </td>
                    <td class="px-4 py-3">{{ $drive->role }}</td>
                    <td class="px-4 py-3 text-right">{{ number_format($drive->package_lpa, 1) }}</td>
                    <td class="px-4 py-3 text-right">{{ number_format($drive->min_cgpa, 1) }}</td>
                    <td class="px-4 py-3">{{ \Illuminate\Support\Carbon::parse($drive->last_date)->format('d M Y') }}</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center justify-end gap-3 whitespace-nowrap">
                            <a href="{{ url('/drives/'.$drive->id) }}" class="font-medium text-indigo-600 hover:text-indigo-800">View</a>
                            <a href="{{ url('/drives/'.$drive->id.'/edit') }}" class="font-medium text-gray-600 hover:text-gray-900">Edit</a>
                            <form method="POST" action="{{ url('/drives/'.$drive->id) }}" onsubmit="return confirm(@js('Delete '.$drive->company.' – '.$drive->role.'? This cannot be undone.'))">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-medium text-red-600 hover:text-red-800">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
