<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ApiTestGetRepository extends TestCase
{
    /**
     * Test getRepository method in Api
     *
     * @return void
     */
    public function testGetRepository()
    {
        $response = $this->json('GET', '/api/v1/repository/Weso1ek/compare-repositories');
        $response->assertStatus(200)
            ->assertJson([
                "name" => "compare-repositories",
            ]);
    }
}
