<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubscriptionTest extends TestCase
{

  use RefreshDatabase, WithFaker;

  /** @test */
  public function a_user_must_subscribe_to_use_the_application()
  {
     $this->actingAs(factory('App\User')->create());

      $this->get('/starrecords')

            ->assertRedirect('/starrecords/subscription');

     auth()->user()->subscribe();

     $john = auth()->user()->fresh();

     $this->actingAs($john)->get('/starrecords')

     ->assertSee('Dashboard');
  }

  /** @test */
  public function a_user_can_subscribe()
  {
      $user = factory('App\User')->create();

      $this->actingAs($user);

      $subDetails = factory('App\CardSubscription')->raw();

      $this->post('/starrecords/subscription', $subDetails)

            ->assertRedirect('/starrecords');


     $this->assertDatabaseHas('card_subscriptions', $subDetails);

     $this->assertTrue($user->fresh()->subscription);
  }
}
