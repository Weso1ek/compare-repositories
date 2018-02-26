<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ApiTestGetUserRepositories extends TestCase
{
    /**
     * Test getUser method in Api
     *
     * @return void
     */
    public function testGetUserRepositories()
    {
        $response = $this->json('GET', '/api/v1/user/repositories/Weso1ek');
        $response->assertStatus(200)
            ->assertJson([
                "name" => "compare-repositories",
            ]);
    }
}
