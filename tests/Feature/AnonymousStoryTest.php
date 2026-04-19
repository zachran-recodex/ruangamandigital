<?php

use App\Models\AnonymousStory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;

uses(RefreshDatabase::class);

test('anonymous story can be stored', function () {
    expect(Schema::hasTable('anonymous_stories'))->toBeTrue();

    $anonymousStory = AnonymousStory::create([
        'story' => 'Ini cerita anonim untuk pengujian.',
    ]);

    $this->assertDatabaseHas('anonymous_stories', [
        'id' => $anonymousStory->id,
    ]);

    $anonymousStory->delete();
});

test('anonymous story form submission stores to database', function () {
    $response = $this->post(route('anonymous-stories.store'), [
        'story' => 'Ini cerita anonim untuk pengujian via form.',
        'anonConfirm' => '1',
    ]);

    $response->assertRedirect();

    $this->assertDatabaseHas('anonymous_stories', [
        'story' => 'Ini cerita anonim untuk pengujian via form.',
    ]);
});

test('anonymous story detail page can be rendered', function () {
    $story = AnonymousStory::create([
        'story' => 'Ini cerita anonim untuk halaman detail.',
    ]);

    $response = $this->get(route('anonymous-stories.show', $story));

    $response->assertOk()
        ->assertSee('Ini cerita anonim untuk halaman detail.');
});
