<?php

use App\Models\Drive;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('the create drive form is displayed', function () {
    $this->get('/drives/create')
        ->assertOk()
        ->assertSee('New Placement Drive')
        ->assertSee('name="company"', false);
});

test('a drive can be created', function () {
    $lastDate = now()->addWeek()->toDateString();

    $response = $this->post('/drives', [
        'company' => 'Zoho',
        'role' => 'Software Developer',
        'package_lpa' => 8.4,
        'min_cgpa' => 7.5,
        'last_date' => $lastDate,
    ]);

    $drive = Drive::sole();

    $response->assertRedirect('/drives/'.$drive->id)
        ->assertSessionHas('status', 'Drive created successfully.');

    expect($drive->company)->toBe('Zoho')
        ->and($drive->role)->toBe('Software Developer')
        ->and((float) $drive->package_lpa)->toBe(8.4)
        ->and((float) $drive->min_cgpa)->toBe(7.5)
        ->and($drive->last_date)->toBe($lastDate);
});

test('required fields are validated', function () {
    $this->from('/drives/create')
        ->post('/drives', [])
        ->assertRedirect('/drives/create')
        ->assertSessionHasErrors(['company', 'role', 'package_lpa', 'min_cgpa', 'last_date']);

    expect(Drive::count())->toBe(0);
});

test('invalid values are rejected', function () {
    $this->post('/drives', [
        'company' => 'Zoho',
        'role' => 'Software Developer',
        'package_lpa' => 150,
        'min_cgpa' => 11,
        'last_date' => now()->subDay()->toDateString(),
    ])->assertSessionHasErrors(['package_lpa', 'min_cgpa', 'last_date']);

    expect(Drive::count())->toBe(0);
});
