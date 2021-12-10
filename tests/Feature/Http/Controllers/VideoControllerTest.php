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
        $user = User::factory()->create();

        $data = [
            'user_id' => User::factory(),
            'title'   => $this->faker->sentence(),
            'iframe'  => $this->faker->url(),
            'like'    => rand(1, 200),
            'description' => $this->faker->text(500),
        ];

        $this  
            ->actingAs($user)
            ->post('videos', $data)
            ->assertRedirect('videos');

        $this->assertDatabaseHas('videos', $data);
    }
}
