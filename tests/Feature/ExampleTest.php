<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
   
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertSee('TDD');

        $response->assertStatus(200);
    }

    
    public function test_homepage(){
        $response = $this->get('/');
        $response->assertSee('Laracasts');
    }

    public function test_about_page()
    {
        $check = $this->get('/about');
        $check->assertStatus(200);
        $check->assertSee('Hello');
    }

    public function test_services_page()
    {
        $response = $this->get('/services');
        $response->assertSee('services');
        $response->assertDontSee('About');
    }

    public function test_contact_page()
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
    }

    public function test_that_contact_page_has_content()
    {
        $response = $this->get('/contact');
        $response->assertSee('Contact Page');
    }
}
