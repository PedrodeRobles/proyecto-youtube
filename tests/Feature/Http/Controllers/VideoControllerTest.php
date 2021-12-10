<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\User;
use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class VideoControllerTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function test_guest()
    {
        $this->get('videos')->assertRedirect('login');         // index
        $this->get('videos/1')->assertRedirect('login');       // show 
        $this->get('videos/1/edit')->assertRedirect('login');  // edit
        $this->put('videos/1')->assertRedirect('login');       // update
        $this->delete('videos/1')->assertRedirect('login');    // destroy 
        $this->get('videos/create')->assertRedirect('login');  // create
        $this->post('videos', [])->assertRedirect('login');    // sotore
    }

    public function test_store()
    {
        $data = [
            'title'   => $this->faker->sentence(),
            'iframe'  => $this->faker->url(),
            'description' => $this->faker->text(500),
        ];

        $user = User::factory()->create();

        $this  
            ->actingAs($user)
            ->post('videos', $data)
            ->assertRedirect('videos');

        $this->assertDatabaseHas('videos', $data);
    }

    public function test_validate_store()
    {
        $user = User::factory()->create();

        $this  
            ->actingAs($user)
            ->post('videos', [])
            ->assertStatus(302)
            ->assertSessionHasErrors('title', 'iframe');
    }

    public function test_update()
    {
        $user = User::factory()->create();                            // id = 1
        $video = Video::factory()->create(['user_id' => $user->id]);  // user_id = 1

        $data = [
            'title'   => $this->faker->sentence(),
            'iframe'  => $this->faker->url(),
            'description' => $this->faker->text(500),
        ];


        $this  
            ->actingAs($user)
            ->put("videos/$video->id", $data)
            ->assertRedirect("videos/$video->id/edit");

        $this->assertDatabaseHas('videos', $data);
    }

    public function test_validate_update()
    {
        $user = User::factory()->create();                            // id = 1
        $video = Video::factory()->create(['user_id' => $user->id]);  // user_id = 1

        $this  
            ->actingAs($user)
            ->put("videos/$video->id", [])
            ->assertStatus(302)
            ->assertSessionHasErrors('title', 'iframe');
    }
}
