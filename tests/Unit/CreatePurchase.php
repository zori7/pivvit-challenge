<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreatePurchase extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->json('POST', '/purchases', ['customer_name' => 'Sally']);

        $response->assertStatus(422);

        $response = $this->json('POST', '/purchases', ['customer_name' => 'Sally', 'quantity' => 5]);

        $response->assertStatus(422);

        $response = $this->json('POST', '/purchases', ['customer_name' => 'Sally', 'quantity' => 0, 'offering_id' => 1]);

        $response->assertStatus(422);

        $response = $this->json('POST', '/purchases', ['customer_name' => 'Sally', 'quantity' => 5, 'offering_id' => 1]);

        $response->assertStatus(200);

    }
}
