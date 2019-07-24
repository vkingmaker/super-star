<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersFeedbackTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function a_user_can_add_a_comment()
    {
        $this->withoutExceptionHandling();

        $video = factory('App\Video')->create();

        $this->post($video->path().'/comment', $comment = ['comment' => 'Thats an awesome video you got there'])

                ->assertRedirect($video->path());

        $this->assertDatabaseHas('viewers_feedback', $comment);

    }

}
