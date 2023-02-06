<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Music;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StoreMusicTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_that_music_is_being_stored()
    {
        //Phase 1
        $music = Music::create([
            'title' => 'Davido - Fia',
            'music' => 'fia.mp3'
        ]);

        //Phase 2
        $response = $this->get('/music');


        //Phase 3
        $response->assertStatus(200);
        $response->assertDontSee('No Music Found');
        $response->assertSee($music->name);
        $this->assertDatabaseCount('music', 1);
        $this->assertDatabaseHas('music', [
            'title' => 'Davido - Fia'
        ]);
    }
}
