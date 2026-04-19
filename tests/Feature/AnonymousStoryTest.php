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
