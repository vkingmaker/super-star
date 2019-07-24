<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

class administrativeRolesTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function a_user_should_be_able_to_upload_a_video()
    {
        $video = factory('App\Video')->raw();

        $this->post('/starrecords/videos', $video)

                ->assertRedirect('/starrecords');

        $this->assertDatabaseHas('videos', $video);
    }

    /** @test */
    public function video_must_have_a_title()
    {
        $video = factory('App\Video')->raw(['title' => '']);

        $this->post('/starrecords/videos', $video)

                ->assertSessionHasErrors('title');

        $this->assertDatabaseMissing('videos', $video);
    }

    /** @test */
    public function video_must_have_a_valid_url()
    {
        $video = factory('App\Video')->raw(['url' => 'some-strange-address']);

        $this->post('/starrecords/videos', $video)

                ->assertStatus(403);

        $this->assertDatabaseMissing('videos', $video);
    }

    /** @test */
    public function video_title_can_not_be_updated_with_empty_strings()
    {
        $this->withExceptionHandling();

        $video = factory('App\Video')->create();

        $this->patch($video->path(), ['title' => ""])

                ->assertStatus(403);
    }

    /** @test */
    public function video_titles_on_must_be_valid_for_an_update_to_be_successful()
    {
        $video = factory('App\Video')->create();

        $this->patch($video->path(), $updatedVideo = ['title' => "Oliver twist"])

                ->assertRedirect('starrecords');

        $this->assertDatabaseHas('videos', $updatedVideo);

    }

    /** @test */
    public function a_video_can_be_deleted()
    {
        $video = factory('App\Video')->create();

        $this->delete($video->path())

                ->assertRedirect('starrecords');

        $this->assertDatabaseMissing('videos', $video->toArray());
    }

    /** @test */
    public function a_user_can_uplaod_music()
    {
        $music = factory('App\Music')->raw();

        $this->post('/starrecords/musics', $music)

                ->assertRedirect('/starrecords');

        $this->assertDatabaseHas('musics', $music);

    }

    /** @test */
    public function a_music_has_valid_title()
    {
        $music = factory('App\Music')->raw(['title' => '']);

        $this->post('/starrecords/musics', $music);

        $this->assertDatabaseMissing('musics', $music);

    }

    /** @test */
    public function a_music_can_be_liked()
    {
        $music = factory('App\Music')->create();

        $this->patch($music->path().'/like');

        $this->assertEquals(1, (int) DB::table('musics')->where('id', $music->id)->first('likes')->likes);

        $this->patch($music->path().'/like');

        $this->assertEquals(2, (int) DB::table('musics')->where('id', $music->id)->first('likes')->likes);
    }

    /** @test */
    public function a_music_can_be_deleted()
    {
        $this->withoutExceptionHandling();

        $music = factory('App\Music', 3)->create();

        $this->delete($music[0]->path())

            ->assertRedirect('starrecords');

        $this->assertEquals(2, DB::table('musics')->count());

        $this->delete($music[1]->path());

        $this->assertEquals(1, DB::table('musics')->count());

    }

    /** @test */
    public function a_photo_has_a_caption()
    {
        $photo = factory('App\Photo')->raw(['caption' => 'beacation was lit!']);

        $this->post('/starrecords/photos', $photo)

            ->assertRedirect('/starrecords');

        $this->assertDatabaseHas('photos', $photo);
    }

    /** @test */
    public function a_user_can_create_an_upcoming_tour()
    {
        $tour = factory('App\Tour')->raw();

        $this->post('/starrecords/tours', $tour)

                ->assertRedirect('/starrecords');

        $this->assertDatabaseHas('tours', $tour);
    }

    /** @test */
    public function a_tour_must_have_a_venue()
    {
        $tour = factory('App\Tour')->raw(['venue' => null]);

        $this->post('/starrecords/tours', $tour)

                ->assertRedirect('/starrecords');

        $this->assertDatabaseMissing('tours', $tour);
    }



}
