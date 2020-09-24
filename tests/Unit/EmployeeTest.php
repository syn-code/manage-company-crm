<?php

namespace Tests\Unit;

use App\Employee;
use App\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeTest extends TestCase
{

    use RefreshDatabase;

   protected function setUp(): void
   {
       parent::setUp();
       factory(Company::class, 1)->create();
       factory(Employee::class, 3)->create();
   }

    /**
     * @test
     */
   public function testEmployeesReturnedForACompany()
   {
       $this->assertEquals(3, Employee::where('company_id', 1)->count());
   }

}
