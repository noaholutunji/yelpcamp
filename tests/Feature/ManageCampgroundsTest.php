<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageCampgroundsTest extends TestCase
{
    use WithFaker, RefreshDatabase;


    /** @test */
    public function guests_cannot_manage_campgrounds()
    {
        $campground = factory('App\Campground')->create();

         
        $this->get('/campgrounds')->assertRedirect('login');
        $this->get('/campgrounds/create')->assertRedirect('login');
        $this->get($campground->path() . '/edit')->assertRedirect('login');
        $this->get($campground->path())->assertRedirect('login');
        $this->post('/campgrounds', $campground->toArray())->assertRedirect('login');
    }


    /** @test */

    public function a_user_can_create_a_campground()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $this->get('/campgrounds/create')->assertStatus(200);

        $attributes = [
            'name' => $this->faker->sentence,
            'image' => $this->faker->imageUrl,
            'description' => $this->faker->sentence
        ];

        $this->post('/campgrounds', $attributes);

        $this->assertDatabaseHas('campgrounds', $attributes);
        $this->get('/campgrounds')->assertSee($attributes['name']);
    }

    /** @test */

    public function a_user_can_update_a_campground()
    {
        $this->signIn();

        $this->withoutExceptionHandling();

        $campground = factory('App\Campground')->create(['owner_id' => auth()->id()]);
        $this->patch($campground->path(), [
         'name' => 'Changed',
         'image' => 'Changed',
         'description' => 'Changed'
    ])->assertRedirect($campground->path());

        $this->get($campground->path().'/edit')->assertok();

        $this->assertDatabaseHas('campgrounds', ['name' => 'Changed', 'image' => 'Changed', 'description' => 'Changed']);
    }

    /** @test */
    public function a_user_can_view_their_campground()
    {
        $this->signIn();

        $this->withoutExceptionHandling();

        $campground = factory('App\Campground')->create(['owner_id' => auth()->id()]);

        $this->get($campground->path())
             ->assertSee($campground->name)
             ->assertSee($campground->image)
             ->assertSee($campground->description);
    }


    /** @test */
    public function an_authenticated_user_cannot_view_the_campgrounds_of_others()
    {
        $this->signIn();

        $campground = factory('App\Campground')->create();

        $this->get($campground->path())->assertStatus(403);
    }

    /** @test */
    public function an_authenticated_user_cannot_update_the_campgrounds_of_others()
    {
        $this->signIn();

        $campground = factory('App\Campground')->create();

        $this->patch($campground->path(), [])->assertStatus(403);
    }

    /** @test */
    public function a_campground_requires_a_name()
    {
        $this->signIn();

        $attributes = factory('App\Campground')->raw(['name' => '']);

        $this->post('/campgrounds', $attributes)->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_campground_requires_an_image()
    {
        $this->signIn();
        $attributes = factory('App\Campground')->raw(['image' => '']);
        $this->post('/campgrounds', $attributes)->assertSessionHasErrors('image');
    }

    /** @test */
    public function a_campground_requires_a_description()
    {
        $this->signIn();
        $attributes = factory('App\Campground')->raw(['description' => '']);
        $this->post('/campgrounds', $attributes)->assertSessionHasErrors('description');
    }

    /** @test */
    public function a_user_can_delete_a_campground()
    {
        $campground = factory('App\Campground')->create();

        $this->actingAs($campground->owner)
               ->delete($campground->path())
              ->assertRedirect('/campgrounds');
           
    
        $this->assertDatabaseMissing('campgrounds', $campground->only('id'));
    }
  
        
    
}
