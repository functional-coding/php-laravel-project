<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @internal
 * @coversNothing
 */
class ExampleTest extends TestCase
{
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
