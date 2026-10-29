@extends('layouts.app')
@section('content')
@php
    $lastDate = \Illuminate\Support\Carbon::parse($drive->last_date)->endOfDay();
    $isOpen = $lastDate->isFuture();
    $daysLeft = (int) now()->startOfDay()->diffInDays($lastDate->copy()->startOfDay());
@endphp

<div class="mb-6 flex flex-wrap items-center justify-between gap-3">
    <a href="{{ url('/drives') }}" class="inline-flex items-center gap-1 text-sm font-medium text-indigo-600 hover:text-indigo-800">
        &larr; Back to all drives
    </a>

    <div class="flex items-center gap-2">
        <a href="{{ url('/drives/'.$drive->id.'/edit') }}" class="rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">
            Edit
        </a>
        <form method="POST" action="{{ url('/drives/'.$drive->id) }}" onsubmit="return confirm('Delete this drive? This cannot be undone.')">
            @csrf
            @method('DELETE')
            <button type="submit" class="rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-700">
                Delete
            </button>
        </form>
    </div>
</div>

<div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
    <div class="flex flex-col gap-4 border-b border-gray-200 bg-gradient-to-r from-indigo-600 to-violet-600 p-6 text-white sm:flex-row sm:items-center sm:justify-between">
        <div class="flex items-center gap-4">
            <div class="flex size-14 shrink-0 items-center justify-center rounded-lg bg-white/20 text-2xl font-bold">
                {{ strtoupper(substr($drive->company, 0, 1)) }}
            </div>
            <div>
                <h1 class="text-2xl font-semibold">{{ $drive->company }}</h1>
                <p class="text-indigo-100">{{ $drive->role }}</p>
            </div>
        </div>

        @if ($isOpen)
            <span class="inline-flex w-fit items-center rounded-full bg-emerald-100 px-3 py-1 text-sm font-medium text-emerald-800">
                Open &middot; {{ $daysLeft === 0 ? 'closes today' : $daysLeft.' '.\Illuminate\Support\Str::plural('day', $daysLeft).' left' }}
            </span>
        @else
            <span class="inline-flex w-fit items-center rounded-full bg-gray-200 px-3 py-1 text-sm font-medium text-gray-700">
                Closed
            </span>
        @endif
    </div>

    <dl class="grid grid-cols-1 divide-y divide-gray-100 sm:grid-cols-3 sm:divide-x sm:divide-y-0">
        <div class="p-6">
            <dt class="text-sm font-medium text-gray-500">Package</dt>
            <dd class="mt-1 text-2xl font-semibold text-gray-900">
                &#8377;{{ number_format($drive->package_lpa, 1) }} <span class="text-base font-normal text-gray-500">LPA</span>
            </dd>
        </div>
        <div class="p-6">
            <dt class="text-sm font-medium text-gray-500">Minimum CGPA</dt>
            <dd class="mt-1 text-2xl font-semibold text-gray-900">{{ number_format($drive->min_cgpa, 1) }}</dd>
        </div>
        <div class="p-6">
            <dt class="text-sm font-medium text-gray-500">Last Date to Apply</dt>
            <dd class="mt-1 text-2xl font-semibold text-gray-900">{{ $lastDate->format('d M Y') }}</dd>
        </div>
    </dl>
</div>
@endsection
