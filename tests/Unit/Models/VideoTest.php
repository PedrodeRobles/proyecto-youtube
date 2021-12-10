<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\Video;
use Tests\TestCase;

class VideoTest extends TestCase
{
    public function test_belongs_to_user()
    {
        $video = Video::factory()->create();

        $this->assertInstanceOf(User::class, $video->user);
    }
}
