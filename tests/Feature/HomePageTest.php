<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomePageTest extends TestCase
{
    /** @test */
    public function the_home_page_loads_successfully()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
