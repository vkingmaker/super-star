<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VideosTest extends TestCase
{

  use RefreshDatabase;

  /** @test */
  public function it_has_a_path()
  {
      $video = factory('App\Video')->create();

      $this->assertEquals($video->path(), "/starrecords/videos/{$video->id}");
  }
}
