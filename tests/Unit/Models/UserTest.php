<?php

namespace Tests\Unit\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_has_many_videos()
    {
        $user = new User;

        $this->assertInstanceOf(Collection::class, $user->videos);
    }
}
