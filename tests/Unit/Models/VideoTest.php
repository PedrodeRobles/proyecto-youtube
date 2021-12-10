<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\Video;
use Tests\TestCase;

use Illuminate\Foundation\Testing\RefreshDatabase;

class VideoTest extends TestCase
{
    use RefreshDatabase;

    public function test_belongs_to_user()
    {
        $video = Video::factory()->create();

        $this->assertInstanceOf(User::class, $video->user);
    }
}
