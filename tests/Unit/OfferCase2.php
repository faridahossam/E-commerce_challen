<?php

namespace Tests\Unit;

use Tests\TestCase;

// use PHPUnit\Framework\TestCase;

class OfferCase2 extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function testExample(): void
    {
        $data = [
            'key' => 'products',
                'products' => [
                   [
                        'id' => 5,
                        'quantity' => 1,
                    ],
                ],
        ];

        $response = $this->json('POST', 'http://127.0.0.1:8000/api/orders/', $data);

        $response->assertStatus(200) // Or the appropriate status code for a successful POST request
                  ->assertJson([
                      'subtotal' => '199.99',
                      'shipping fees' => 44,
                      'VAT' => 27.9986,
                      'Discount' => [
                      ],
                      'total discount' => 0,
                      'total' => 271.9886,
                  ]);
    }
}
