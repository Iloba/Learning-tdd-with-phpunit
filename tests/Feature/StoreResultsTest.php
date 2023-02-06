<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Result;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StoreResultsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        //Phase one - Try to save a result
        $result = Result::create([
            'name' => "Ilobaa",
            'result' => 4.5,
        ]);

        //Get to see if it gets returned to a page
        $response = $this->get('/results');

        //test to see if page get request was successful
        $response->assertStatus(200);

        //Check if results was really saved
        $response->assertDontSee('No results Found');
        $response->assertSee($result->name);
        $this->assertDatabaseCount('results', 1);
        $this->assertDatabaseHas('results', [
            'name' => "Ilobaa"
        ]);

        $response->assertStatus(200);
    }
}
