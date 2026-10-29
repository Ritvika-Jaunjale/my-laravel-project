<?php

use App\Models\Drive;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('a drive can be viewed', function () {
    $drive = Drive::factory()->create([
        'company' => 'Zoho',
        'role' => 'Software Developer',
    ]);

    $this->get('/drives/'.$drive->id)
        ->assertOk()
        ->assertSee('Zoho')
        ->assertSee('Software Developer');
});

test('viewing a missing drive returns 404', function () {
    $this->get('/drives/999')->assertNotFound();
});
