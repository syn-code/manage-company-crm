<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\Company;

class CompanyCreationTest extends TestCase
{
    use WithoutMiddleware;
    use RefreshDatabase;

   protected function setUp(): void
   {
        parent::setUp();
        factory(Company::class, 2)->create();
   }


    /**
     * @test
     */
   public function testCompanyCanBeCreated()
   {
       $totalCompanies = Company::all()->count();

        $this->assertEquals(2, $totalCompanies);
   }

    /**
     * @test
     */
   public function testSingleCompanyDataStructure()
   {
        $response = $this->get('/get-company?id=1');

        $response->assertJsonStructure([
            'id',
            'name',
            'email',
            'logo',
            'website',
            'created_at',
            'updated_at'
        ]);

   }
}
