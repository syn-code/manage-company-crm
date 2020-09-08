<?php

namespace Tests\Unit;

use Faker\Factory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;


class AdminLoginTest extends TestCase
{
    //refresh the database each test
    use RefreshDatabase;

    /**
     * Fake admin user for testing
     * @var $adminUser
     */
    public $adminUser;

    /**
     * fake non admin
     * @var $nonAdminUser
     */
    public $nonAdminUser;

    protected function setUp(): void
    {
        //This will need to be here to make User Factory available
        parent::setUp();
        factory(User::class, 2)->create();
        /*TODO -
            look at refactoring these as could be made available throughout the test
            rather than before each test is ran
        */
        $this->adminUser = User::where('id', 1)->get()->first();
        $this->nonAdminUser = User::where('id', 2)->get()->first();

    }

    protected function tearDown(): void
    {
        User::destroy([1, 2]);
    }

    public function testThatAdminCanLogin()
    {
        //todo check if the user is admin, cannot remember if I check for is_admin property
       $response = $this->post('/login', [
           'email' => $this->adminUser->email,
           'password' => 'supernova2005',
           '_token' => csrf_token(),
       ]);

      $response->assertRedirect('home');

    }

    public function testNonAdminCantLogin()
    {

        $response = $this->post('/login', [
            'email' => $this->nonAdminUser->email,
            'password' => 'fakePassword',
            '_token' => csrf_token(),
        ]);

        $response->assertRedirect('/');

    }

}
