<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TestProductPage extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_that_products_are_fetched_on_products_page()
    {
        $product = Product::create([
            'name' => 'Iphone 12',
            'price' => 100,
          
        ]);

        $response = $this->get('/products');

        $response->assertStatus(200);

        $response->assertDontSee('No Products Found');

        $response->assertSee($product->price);

        $this->assertDatabaseCount('products', 1);
    }
}
