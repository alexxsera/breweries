<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Breweries\BreweryServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use function response;

class BreweriesApiController extends Controller
{
    public function __construct(private readonly BreweryServiceInterface $breweriesService)
    {
    }

    public function breweries(Request $request): JsonResponse
    {
        if (! $request->has('page')) {
            return response()->json(['error' => 'Page parameter is required'], 400);
        }

        $page = (int) $request->get('page');

        $result = $this->breweriesService->breweries($page);

        if (! $result->isSuccess()) {
            return response()->json(['error' => $result->getErrorMessage()], 500);
        }

        $breweries = $result->getData();

        return response()->json($breweries);
    }
}
