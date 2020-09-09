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

        //create required users
        factory(User::class, 2)->create();

        $this->adminUser = User::where('id', 1)->get()->first();
        $this->adminUser->is_admin = true;


        $this->nonAdminUser = User::where('id', 2)->get()->first();


    }

    /**
     * This will refresh the database on each test
     */
    protected function tearDown(): void
    {
        //clean database up before next test is ran
        $this->refreshInMemoryDatabase();
    }

    /**
     * this will test that a user can log in
     * and the user is redirected to home
     * @test
     */
    public function testThatValidUserCanLoginAndRedirectToHome()
    {

       $response = $this->post('/login', [
               'email' => $this->adminUser->email,
               'password' => 'supernova2005',
               '_token' => csrf_token(),
       ]);

       $response->assertRedirect('/home');

    }

    public function testThatUserIsAdmin()
    {
       $response = $this->actingAs($this->adminUser)
            ->get('/home');


       $this->assertEquals(true, $response->viewData('isAdmin'));
    }
    /**
     * this will test for a non admin user can login
     * @test
     */
    public function testAuthenticationForWrongPassword()
    {

        $response = $this->post('/login', [
            'email' => $this->adminUser->email,
            'password' => 'fakePassword',
            '_token' => csrf_token(),
        ]);

        $response->assertRedirect('/');

    }

    public function testNonAdminUser()
    {
        $response = $this->actingAs($this->nonAdminUser)
            ->get('/home');

        $this->assertEquals(0, $response->viewData('isAdmin'));

    }

}
