<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserLoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_login_with_correct_credentials()
    {
        // Crear usuario de prueba
        $user = User::factory()->create([
            'password' => bcrypt('secret123')
        ]);

        // Intentar login
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'secret123',
        ]);

        // Verificar redirección correcta después de login
        $response->assertRedirect('/home');
        $this->assertAuthenticatedAs($user);
    }
}
