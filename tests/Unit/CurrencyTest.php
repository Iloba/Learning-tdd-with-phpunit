<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Teacher;
use App\Http\Controllers\TeacherController;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CurrencyTest extends TestCase
{

   use RefreshDatabase;
    public function test_the_number_of_amount_paid_to_registered_teachers()
    {
        $teacher = Teacher::factory(5)->create();
        $this->assertEquals(500, (new TeacherController())->calculateWage());
    }

    public function test_the_total_number_of_Product_rows()
    {
        $product = Product::factory(3)->create();
      $this->assertEquals(3, (new TeacherController())->calculateTotalPrice());
    }
}
