<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterUserTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    public function test_user_registration()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);

        $postData = [
            'name' => $this->faker->name(),
            'email' => $this->faker->email,
            'phone' => '08054421899',
            'password' => 'emeka123',
            'password_confirmation' => 'emeka123'
        ];

        $postRequest = $this->post(route('candidate.register'), $postData);
        $postRequest->assertValid();
        // $postRequest->assertSuccessful(); find the right assertion
        $postRequest->assertRedirect('/register');
        $postRequest->assertSessionHas('success', 'Registration Successful');
    }

    public function test_teachers_registration()
    {
        $getPage = $this->get('/teachers');
        $getPage->assertStatus(200);

        $data = [
            'name' => $this->faker->name(),
            'email' => $this->faker->email,
            'phone' => 1,
            'password' => 'password',
            'password_confirmation' => 'password'
        ];


        $postRequest = $this->post(route('register.teacher'), $data);
        $postRequest->assertValid();
        $postRequest->assertSessionHas('success');
        $postRequest->assertRedirect('/teachers');
    }

    public function test_that_users_can_visit_edit_page()
    {
        $dataToEdit = Teacher::factory()->create();
        $getPage = $this->get(route('edit.teacher', $dataToEdit->id));
        $getPage->assertStatus(200);
        $viewData = $getPage->viewData('teacher');
        $this->assertEquals($dataToEdit->name, $viewData->first()->name);
     
    }

    public function test_that_users_can_update_profile()
    {
        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'phone' => "08054421788",
            'password' => 'newPassword1',
            'password_confirmation' => 'newPassword1'
        ];
        $user = Teacher::factory()->create();
        

        $editRequest = $this->patch(route('update.teacher',  $user->id), $data);
        $editRequest->assertValid();
        $editRequest->assertStatus(302);
        $editRequest->assertSessionHas('success');
        $editRequest->assertRedirect(route('teachers'));
    }
}
