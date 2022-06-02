<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function testRegisterForm()
    {
        $response=$this->get('/register');
        $response->assertStatus(200);
    }

    public function testRegisterUser()
    {
        $response=$this->post('register',[
            'name' => "Amer Sohail",
            'email' => "test@test.com",
            'password' => "test@test.com",
            'password_confirmation' => 'test@test.com',
        ]);

        //dd($response);
        $response->assertStatus(302);
        //$response->assertRedirect('home');
    }

    public function testLoginUser()
    {
        $response=$this->post('/login',[
            'email' => 'test@test.com',
            'password' => 'test@test.com'
        ]);

        $response->assertStatus(302);
    }

    public function testLogiForm()
    {
        $response=$this->get('/login');

        $response->assertStatus(200)->assertViewIs('auth.login')->assertSee('password');
    }
}
