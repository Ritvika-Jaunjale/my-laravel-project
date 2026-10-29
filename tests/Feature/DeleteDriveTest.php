<?php

use App\Models\Drive;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('a drive can be deleted', function () {
    $drive = Drive::factory()->create();
    $otherDrive = Drive::factory()->create();

    $this->delete('/drives/'.$drive->id)
        ->assertRedirect('/drives')
        ->assertSessionHas('status', 'Drive deleted successfully.');

    $this->assertModelMissing($drive);
    $this->assertModelExists($otherDrive);
});

test('deleting a missing drive returns 404', function () {
    $this->delete('/drives/999')->assertNotFound();
});

test('the listing and detail pages show edit and delete actions', function () {
    $drive = Drive::factory()->create(['company' => "Byju's"]);

    $this->get('/drives')
        ->assertOk()
        ->assertSee('href="'.url('/drives/'.$drive->id.'/edit').'"', false)
        ->assertSee('name="_method" value="DELETE"', false);

    $this->get('/drives/'.$drive->id)
        ->assertOk()
        ->assertSee('href="'.url('/drives/'.$drive->id.'/edit').'"', false)
        ->assertSee('name="_method" value="DELETE"', false);
});
