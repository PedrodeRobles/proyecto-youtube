<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VideoControllerTest extends TestCase
{
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
}
