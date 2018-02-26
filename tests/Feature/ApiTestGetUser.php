<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ApiTestGetUser extends TestCase
{
    /**
     * Test getUser method in Api
     *
     * @return void
     */
    public function testGetUser()
    {
        $response = $this->json('GET', '/api/v1/user/Weso1ek');
        $response->assertStatus(200)
            ->assertJson([
                'login' => 'Weso1ek',
            ]);
    }
}
