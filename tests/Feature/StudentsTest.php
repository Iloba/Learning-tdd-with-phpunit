<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Student;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_register_student()
    {
        $student = Student::create([
            'name' => 'Janet Jacob',
            'age' => 21,
            
        ]);

        $response = $this->get('/students');
        $response->assertStatus(200);
        $response->assertDontSee('No results found');
      
        $viewData = $response->viewData('students');
        $this->assertEquals($student->name, $viewData->first()->name);
        $this->assertDatabaseCount('students', 1);
        $this->assertDatabaseHas('students', [
            'name' => 'Janet Jacob'
        ]);

      
    }
}
