<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BreweriesApiControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testBreweriesWithAuthentication(): void
    {
        // Creare un utente di test
        $user = User::factory()->create([
            'name' => 'root',
            'email' => 'root@example.com',
        ]);

        // Eseguire la richiesta di login per ottenere il token di accesso
        $response = $this->post('api/auth/login', [
            'name' => $user->name,
            'password' => 'password', // Assicurati di usare la password corretta per l'utente di test
        ]);

        // Verifica che la richiesta di login sia stata effettuata correttamente
        $response->assertStatus(200);
        $response->assertJsonStructure(['access_token']);

        // Ottenere il token di accesso dalla risposta
        $accessToken = $response->json('access_token');

        // Utilizzare il token di accesso per eseguire una richiesta autenticata alla rotta 'breweries/1'
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->get('api/breweries?page=1');

        // Verifica che la richiesta alla rotta 'breweries/1' sia stata effettuata correttamente
        $response->assertStatus(200);
        // Verifica il contenuto della risposta JSON se necessario
    }
}
