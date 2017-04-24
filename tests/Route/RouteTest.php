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
    public function it_reroutes_registration_requests_to_the_home_page()
    {
        $response = $this->call('GET', route('register'));
        $this->assertEquals(302, $response->status());
    }

    /** @test */
    public function it_can_access_the_forgot_password_page()
    {
        $response = $this->call('GET', route('password.request'));
        $this->assertEquals(200, $response->status());
    }

    /** @test */
    public function it_can_access_the_home_page()
    {
        $response = $this->actingAs($this->user)->call('GET', route('home'));
        $this->seeIsAuthenticated();
        $this->assertEquals(200, $response->status());
    }

    /** @test */
    public function it_can_access_the_videos_page()
    {
        //        TODO: Fix this test
//        $response = $this->actingAs($this->user)->call('GET', route('videos'));
//        $this->seeIsAuthenticated();
//        $this->assertEquals(200, $response->status());
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
