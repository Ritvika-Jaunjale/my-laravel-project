<?php

use App\Models\Drive;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('the edit form is prefilled with the drive details', function () {
    $drive = Drive::factory()->create([
        'company' => 'Zoho',
        'role' => 'Software Developer',
    ]);

    $this->get('/drives/'.$drive->id.'/edit')
        ->assertOk()
        ->assertSee('Edit Placement Drive')
        ->assertSee('value="Zoho"', false)
        ->assertSee('value="Software Developer"', false)
        ->assertSee('value="'.$drive->last_date.'"', false);
});

test('a drive can be updated', function () {
    $drive = Drive::factory()->create();
    $lastDate = now()->addWeeks(2)->toDateString();

    $this->put('/drives/'.$drive->id, [
        'company' => 'Freshworks',
        'role' => 'Backend Engineer',
        'package_lpa' => 12.5,
        'min_cgpa' => 7.25,
        'last_date' => $lastDate,
    ])
        ->assertRedirect('/drives/'.$drive->id)
        ->assertSessionHas('status', 'Drive updated successfully.');

    $drive->refresh();

    expect($drive->company)->toBe('Freshworks')
        ->and($drive->role)->toBe('Backend Engineer')
        ->and((float) $drive->package_lpa)->toBe(12.5)
        ->and((float) $drive->min_cgpa)->toBe(7.25)
        ->and($drive->last_date)->toBe($lastDate);
});

test('a closed drive can be updated with a past last date', function () {
    $pastDate = now()->subWeek()->toDateString();
    $drive = Drive::factory()->create(['last_date' => $pastDate]);

    $this->put('/drives/'.$drive->id, [
        'company' => $drive->company,
        'role' => 'Corrected Role',
        'package_lpa' => $drive->package_lpa,
        'min_cgpa' => $drive->min_cgpa,
        'last_date' => $pastDate,
    ])->assertSessionHasNoErrors();

    expect($drive->refresh()->role)->toBe('Corrected Role');
});

test('invalid updates are rejected and the drive is unchanged', function () {
    $drive = Drive::factory()->create(['company' => 'Zoho']);

    $this->from('/drives/'.$drive->id.'/edit')
        ->put('/drives/'.$drive->id, [
            'company' => '',
            'role' => 'Software Developer',
            'package_lpa' => 150,
            'min_cgpa' => 11,
            'last_date' => 'not-a-date',
        ])
        ->assertRedirect('/drives/'.$drive->id.'/edit')
        ->assertSessionHasErrors(['company', 'package_lpa', 'min_cgpa', 'last_date']);

    expect($drive->refresh()->company)->toBe('Zoho');
});

test('editing or updating a missing drive returns 404', function () {
    $this->get('/drives/999/edit')->assertNotFound();

    $this->put('/drives/999', [
        'company' => 'Zoho',
        'role' => 'Software Developer',
        'package_lpa' => 8.4,
        'min_cgpa' => 7.5,
        'last_date' => now()->addWeek()->toDateString(),
    ])->assertNotFound();
});
