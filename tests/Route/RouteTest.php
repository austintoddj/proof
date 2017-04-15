<?php

namespace Tests\Route;

use Tests\TestCase;

class RouteTest extends TestCase
{
    use \CreatesUser;

    /** @test */
    public function it_can_access_the_welcome_page()
    {
        $response = $this->call('GET', '/');
        $this->assertEquals(200, $response->status());
    }

    /** @test */
    public function it_can_access_the_login_page()
    {
        $response = $this->call('GET', route('login'));
        $this->assertEquals(200, $response->status());
    }

    /** @test */
    public function it_can_access_the_register_page()
    {
        $response = $this->call('GET', route('register'));
        $this->assertEquals(200, $response->status());
    }

    /** @test */
    public function it_can_access_the_forgot_password_page()
    {
        $response = $this->call('GET', route('password.request'));
        $this->assertEquals(200, $response->status());
    }

    /** @test */
    public function it_can_access_the_dashboard_page()
    {
        $response = $this->actingAs($this->user)->call('GET', route('dashboard'));
        $this->seeIsAuthenticated();
        $this->assertEquals(200, $response->status());
    }
}
