<?php

namespace Tests\Feature\App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    private array $mockLoginData;

    public function setUp(): void
    {
        parent::setUp();

        $this->mockLogin = [
            'email' => 'welleh10@gmail.com',
            'password' => 'password'
        ];
    }

    public function test_user_can_view_a_register_form()
    {
        $response = $this->get('/register');
        $response->assertSuccessful();
        $response->assertViewIs('users.register');
    }

    public function test_user_can_view_a_login_form()
    {
        $response = $this->get('/login');
        $response->assertSuccessful();
        $response->assertViewIs('users.login');
    }

    public function test_user_cannot_view_a_login_form_when_authenticated()
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get('/login');
        $response->assertRedirect('/');
    }

    public function test_user_can_login_with_correct_credentials()
    {
        $user = \App\Models\User::factory()->create([
            'password' => bcrypt($password = 'beyblade'),
        ]);

        $response = $this->post('users/authenticate', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertRedirect('/products/manage');
        $this->assertAuthenticatedAs($user);
    }

    public function test_user_cannot_login_with_incorrect_password()
    {
        $user = \App\Models\User::factory()->create([
            'password' => bcrypt('beyblade'),
        ]);

        $response = $this->from('/login')->post('users/authenticate', [
            'email' => $user->email,
            'password' => 'de-ruim',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    public function test_user_can_logout()
    {
        $user = \App\Models\User::factory()->create([
            'password' => bcrypt($password = 'beyblade'),
        ]);

        $response = $this->post('users/authenticate', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertRedirect('/products/manage');
        $this->assertAuthenticatedAs($user);

        $response = $this->post('/logout');
        $response->assertRedirect('/');
    }
}