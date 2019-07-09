<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Campground;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CampgroundCommentsTest extends TestCase
{
    use RefreshDatabase;


    /** @test */

    public function guests_cannot_add_comments_to_campgrounds()
    {
        $campground = factory('App\Campground')->create();
        $this->post($campground->path() . '/comments')->assertRedirect('login');
    }

    /** @test */

    public function only_the_owner_of_a_campground_may_add_comments()
    {
        $this->signIn();

        $campground = factory('App\Campground')->create();

        $this->post($campground->path() . '/comments', ['body' => 'Test comment'])
              ->assertStatus(403);

        $this->assertDatabaseMissing('comments', ['body' => 'Test comment']);
    }

    /** @test */

    public function a_campground_can_have_comments()
    {
        $this->signIn();

       

        $campground = auth()->user()->campgrounds()->create(
            factory(Campground::class)->raw()
        );

        $this->post($campground->path() . '/comments', ['body' => 'Test comment']);
       
        $this->get($campground->path())
              ->assertSee('Test comment');
    }

    /** @test */
    public function a_comment_requires_a_body()
    {
        $this->signIn();


        $campground = auth()->user()->campgrounds()->create(
            factory(Campground::class)->raw()
        );

        $attributes = factory('App\Comment')->raw(['body' => '']);
        
        $this->post($campground->path() . '/comments', $attributes)->assertSessionHasErrors('body');
    }
}
