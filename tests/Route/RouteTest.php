<?php

namespace Tests\Route;

use CreatesUser;
use Tests\TestCase;
use InteractsWithDatabase;

class RouteTest extends TestCase
{
    use CreatesUser, InteractsWithDatabase;

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

    /** @test */
    public function it_can_access_the_trending_page()
    {
        $response = $this->actingAs($this->user)->call('GET', route('trending'));
        $this->seeIsAuthenticated();
        $this->assertEquals(200, $response->status());
    }

    /** @test */
    public function it_can_access_the_submit_page()
    {
        $response = $this->actingAs($this->user)->call('GET', route('submit'));
        $this->seeIsAuthenticated();
        $this->assertEquals(200, $response->status());
    }

    /** @test */
    public function it_receives_a_404_error_for_a_page_not_found()
    {
        $response = $this->actingAs($this->user)->call('GET', url('nothing-to-see-here'));
        $this->seeIsAuthenticated();
        $this->assertEquals(404, $response->status());
    }
}
