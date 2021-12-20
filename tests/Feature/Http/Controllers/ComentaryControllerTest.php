<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Comentary;
use App\Models\User;
use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ComentaryControllerTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function test_guest()
    {
        $this->post('video/{video}', [])->assertRedirect('login');
        $this->put('video/{video}', [])->assertRedirect('login');
        $this->delete('video/{video}')->assertRedirect('login');
    }

    public function test_store_comentary()
    {
        $user = User::factory()->create();     //id = 1
        $video = Video::factory()->create();   //user_id = 2

        $data = [
            'user_id'   => $user->id,
            'video_id'  => $video->id,
            'comentary' => $this->faker->text(200)
        ];

        $this
            ->actingAs($user)
            ->post('video/{video}', $data);
            //->assertRedirect('video/{video}');

        $this->assertDatabaseHas('comentaries', $data);
    }
}
