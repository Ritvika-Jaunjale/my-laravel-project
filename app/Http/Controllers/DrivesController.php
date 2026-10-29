<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDriveRequest;
use App\Http\Requests\UpdateDriveRequest;
use App\Models\Drive;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class DrivesController extends Controller
{
    public $drives = [];

    public function index()
    {
        $drives = Drive::all();

        return view('drives.index', ['drives' => $drives]);
    }

    public function create(): View
    {
        return view('drives.create');
    }

    public function store(StoreDriveRequest $request): RedirectResponse
    {
        $drive = Drive::create($request->validated());

        return redirect('/drives/'.$drive->id)->with('status', 'Drive created successfully.');
    }

    public function show(int $id): View
    {
        $drive = Drive::findOrFail($id);

        return view('drives.show', ['drive' => $drive]);
    }

    public function edit(int $id): View
    {
        $drive = Drive::findOrFail($id);

        return view('drives.edit', ['drive' => $drive]);
    }

    public function update(UpdateDriveRequest $request, int $id): RedirectResponse
    {
        $drive = Drive::findOrFail($id);

        $drive->update($request->validated());

        return redirect('/drives/'.$drive->id)->with('status', 'Drive updated successfully.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $drive = Drive::findOrFail($id);

        $drive->delete();

        return redirect('/drives')->with('status', 'Drive deleted successfully.');
    }
}
