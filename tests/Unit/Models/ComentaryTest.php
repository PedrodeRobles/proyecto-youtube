<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\Video;
use App\Models\Comentary;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;

class ComentaryTest extends TestCase
{
    use RefreshDatabase;

    // public function test_belongs_to_video()
    // {
    //     $comentary = Comentary::factory()->create();

    //     $this->assertInstanceOf(Video::class, $comentary->video);
    // }

    public function test_belongs_to_user()
    {
        $comentary = Comentary::factory()->create();

        $this->assertInstanceOf(User::class, $comentary->user);
    }
}
