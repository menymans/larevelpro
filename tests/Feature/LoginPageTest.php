<?php

namespace Tests\Feature;

use Tests\TestCase;

class LoginPageTest extends TestCase
{
    /** @test */
    public function the_login_page_loads_successfully()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSee('Login'); // Busca la palabra "Login" en el HTML
    }
}
