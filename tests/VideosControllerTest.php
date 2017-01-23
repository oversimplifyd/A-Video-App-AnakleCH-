<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VideosControllerTest extends TestCase
{

    use WithoutMiddleware;

    private $mocker;
    public function setUp()
    {
        parent::setUp();

        $this->mocker = $this->mock('Acada\Repositories\Video\RepositoryInterface');
    }

    public function tearDown()
    {
        Mockery::close();
    }

    public function mock($class)
    {
        $mock = Mockery::mock($class);

        $this->app->instance($class, $mock);

        return $mock;
    }

    public function testIndex()
    {
        $this->mocker->shouldReceive('all')->once();

        $response = $this->call('GET', '/');

        //$this->assertViewHas('videos');
    }

    public function testSearchCategory()
    {

    }

    public function testView()
    {

    }

    public function testCreate()
    {

    }

    public function testStoreFails()
    {

    }

    public function testUserUploadedVideos()
    {

    }

}
