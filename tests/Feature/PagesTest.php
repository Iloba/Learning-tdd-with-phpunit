<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PagesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_faq_page()
    {
        $response = $this->get('/faq');

        $response->assertStatus(200);
    }

    public function test_to_see_if_faq_page_is_empty()
    {
        $response = $this->get('/faq');

        $response->assertSee('Frequently Asked Questions');
    }
}
