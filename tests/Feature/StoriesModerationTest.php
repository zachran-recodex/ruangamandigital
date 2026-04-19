<?php

use App\Models\AnonymousStory;
use App\Models\User;
use Livewire\Livewire;

test('stories page requires authentication', function () {
    $this->get(route('dashboard'))
        ->assertRedirect(route('login'));
});

test('stories page can render stories for authenticated user', function () {
    $user = User::factory()->create();
    $story = AnonymousStory::create([
        'story' => 'Cerita untuk moderasi.',
    ]);

    $this->actingAs($user)
        ->get(route('dashboard'))
        ->assertOk()
        ->assertSee('Stories')
        ->assertSee('Cerita untuk moderasi.');

    $story->delete();
});

test('story can be deleted from livewire page', function () {
    $user = User::factory()->create();
    $story = AnonymousStory::create([
        'story' => 'Cerita yang akan dihapus.',
    ]);

    Livewire::actingAs($user)
        ->test('pages::dashboard')
        ->call('confirmDelete', $story->id)
        ->assertSet('showDeleteModal', true)
        ->call('deleteStory');

    $this->assertDatabaseMissing('anonymous_stories', [
        'id' => $story->id,
    ]);
});
