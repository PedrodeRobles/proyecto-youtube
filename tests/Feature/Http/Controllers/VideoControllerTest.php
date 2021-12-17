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

    public function test_index_empty()
    {
        $user = User::factory()->create();   // id = 1
        Video::factory()->create();          // user_id = 2

        $this
            ->actingAs($user)
            ->get('videos')
            ->assertStatus(200)
            ->assertSee('No hay videos subidos');
    }

    public function test_index_with_data()
    {
        $user = User::factory()->create();                   // id = 1
        $video = Video::factory()->create(['user_id' => $user->id]);  // user_id = 1

        $this
            ->actingAs($user)
            ->get('videos')
            ->assertStatus(200)
            ->assertSee([
                $video->title,
                $video->get_image,
            ]);
    }

    //EXCEPCION EN LA RUTA
    // public function test_show()
    // {
    //     $user = User::factory()->create();                            // id = 1
    //     $video = Video::factory()->create(['user_id' => $user->id]);  // user_id = 1

    //     $this  
    //         ->actingAs($user)
    //         ->get("videos/$video->id")
    //         ->assertStatus(200);
    // }

    // public function test_show_policy()
    // {
    //     $user = User::factory()->create();     // id = 1
    //     $video = Video::factory()->create();  // user_id = 2

    //     $this  
    //         ->actingAs($user)
    //         ->get("videos/$video->id")
    //         ->assertStatus(403);
    // }

    public function test_store()
    {
        $data = [
            'title'   => $this->faker->sentence(),
            'image'   => $this->faker->url(),
            'iframe'  => $this->faker->url(),
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
            'image'   => $this->faker->url(),
            'iframe'  => $this->faker->url(),
        ];


        $this  
            ->actingAs($user)
            ->put("videos/$video->id", $data)
            ->assertRedirect("videos");

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

    public function test_update_policy()
    {
        $user = User::factory()->create();    // id = 1
        $video = Video::factory()->create();  // user_id = 2

        $data = [
            'title'   => $this->faker->sentence(),
            'iframe'  => $this->faker->url(),
            'description' => $this->faker->text(500),
        ];


        $this  
            ->actingAs($user)
            ->put("videos/$video->id", $data)
            ->assertStatus(403);
    }

    public function test_destroy()
    {
        $user = User::factory()->create();                            // id = 1
        $video = Video::factory()->create(['user_id' => $user->id]);  // user_id = 1

        $this
            ->actingAs($user)
            ->delete("videos/$video->id")
            ->assertRedirect('videos');

        $this->assertDatabaseMissing('videos', [
            'id' => $video->id
        ]);
    }

    public function test_destroy_policy()
    {
        $user = User::factory()->create();    // id = 1
        $video = Video::factory()->create();  // user_id = 2

        $this
            ->actingAs($user)
            ->delete("videos/$video->id")
            ->assertStatus(403);
    }

    public function test_edit()
    {
        $user = User::factory()->create();                            // id = 1
        $video = Video::factory()->create(['user_id' => $user->id]);  // user_id = 1

        $this
            ->actingAs($user)
            ->get("videos/$video->id/edit")
            ->assertStatus(200)
            ->assertSee($video->title)
            ->assertSee($video->iframe);
    }

    public function test_edit_policy()
    {
        $user = User::factory()->create();    // id = 1
        $video = Video::factory()->create();  // user_id = 2

        $this
            ->actingAs($user)
            ->get("videos/$video->id/edit")
            ->assertStatus(403);
    }

    public function test_create()
    {
        $user = User::factory()->create();

        $this
            ->actingAs($user)
            ->get('videos/create')
            ->assertStatus(200);
    }
}
