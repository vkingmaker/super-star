<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PhotoTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function it_has_a_path()
    {

        $this->withoutExceptionHandling();

        $photo = factory('App\Photo')->create();

        $this->assertEquals($photo->path(), "/starrecords/photos/{$photo->id}");
    }
}
