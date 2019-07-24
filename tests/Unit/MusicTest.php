<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MusicTest extends TestCase
{

   use RefreshDatabase;

   /** @test */
   public function it_has_a_path()
   {
       $music = factory('App\Music')->create();

       $this->assertEquals("/starrecords/musics/{$music->id}", $music->path());
   }
}
