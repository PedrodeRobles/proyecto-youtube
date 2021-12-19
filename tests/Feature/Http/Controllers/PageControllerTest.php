<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PageControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_home()
    {
        $video = Video::factory()->create();

        $this
            ->get('/')
            ->assertStatus(200)
            ->assertSee($video->title)
            ->assertSee($video->get_image);
    }

    public function test_show_video()
    {
        $video = Video::factory()->create();

        $this
            ->get("video/$video->id")
            ->assertStatus(200)
            ->assertSee($video->iframe)
            ->assertSee($video->title)
            ->assertSee($video->iframe)
            ->assertSee($video->created_at);
    }
}
