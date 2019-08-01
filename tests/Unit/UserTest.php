<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{

   use RefreshDatabase;

   /** @test */
   public function a_user_can_subscribe()
   {
       $this->actingAs(factory('App\User')->create());

       $this->withoutExceptionHandling();

       auth()->user()->subscribe();

       $this->assertTrue(auth()->user()->fresh()->subscription);
   }
}
