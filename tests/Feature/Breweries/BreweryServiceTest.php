<?php

declare(strict_types=1);

namespace Tests\Unit\Services\Breweries;

use App\Services\Breweries\BreweryService;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class BreweryServiceTest extends TestCase
{
    public function testBreweries(): void
    {
        // Mocking the HTTP response
        Http::fake([
            'https://api.openbrewerydb.org/*' => Http::response(['fake_brewery_data'], 200),
        ]);

        // Creating an instance of the BreweryService
        $breweryService = new BreweryService();

        // Calling the breweries method
        $result = $breweryService->breweries(1);

        // Asserting that the result is not empty and is an array
        $this->assertNotEmpty($result);
        $this->assertTrue($result->isSuccess());
        $this->assertIsArray($result->getData());
    }
}
