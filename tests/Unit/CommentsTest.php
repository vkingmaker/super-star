<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentsTest extends TestCase
{

  use RefreshDatabase;

  /** @test */
  public function a_video_can_have_comments()
  {
      $video = factory('App\Video')->create();

      $video->addComment('This Video is fire!');

      $this->assertDatabaseHas('viewers_feedback', ['comment' => 'This Video is fire!']);
  }
}
