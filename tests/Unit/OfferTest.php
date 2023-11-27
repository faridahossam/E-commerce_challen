<?php

namespace Tests\Unit;

use Tests\TestCase;

// use PHPUnit\Framework\TestCase;

class OfferTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function testCase1(): void
    {
        //  $response = $this->call('POST', 'OrderController@calculate');
        //  $this->assertTrue($response);
        $data = [
            'key' => 'products',
                'products' => [
                   [
                        'id' => 1,
                        'quantity' => 1,
                    ],
                   [
                        'id' => 2,
                        'quantity' => 1,
                    ],
                   [
                        'id' => 3,
                        'quantity' => 1,
                    ],
                   [
                        'id' => 5,
                        'quantity' => 1,
                    ],
                   [
                        'id' => 6,
                        'quantity' => 1,
                    ],
                ],
        ];

        $response = $this->json('POST', 'http://127.0.0.1:8000/api/orders/', $data);

        $response->assertStatus(200) // Or the appropriate status code for a successful POST request
                  ->assertJson([
                      'subtotal' => '386.95',
                      'shipping fees' => 110,
                      'VAT' => 54.173,
                      'Discount' => [
                          '50% off jacket:  -$99.995',
                          '10% off shoes:  -$7.999',
                          '$10 of shipping:   -$10',
                      ],
                      'total discount' => 117.994,
                      'total' => 433.129,
                  ]);
    }
}
