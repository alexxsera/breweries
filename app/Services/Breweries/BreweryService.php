<?php

declare(strict_types=1);

namespace App\Services\Breweries;

use App\DataResult\Classes\DataResult;
use App\DataResult\Classes\ResultStatus;
use App\DataResult\Traits\DataResultTrait;
use Illuminate\Support\Facades\Http;

use function http_build_query;

class BreweryService implements BreweryServiceInterface
{
    use DataResultTrait;

    public function breweries(int $page): DataResult
    {
        $url = self::BASEURL . 'v1/breweries?' . http_build_query([
            'page' => $page,
            'per_page' => 10,
        ]);

        return $this->doFetchBreweries($url);
    }

    private function doFetchBreweries(string $url): DataResult
    {
        $response = Http::get($url);

        if (! $response->successful()) {
            return $this->buildDataResult(null, $response->reason())
                ->status(ResultStatus::VALIDATION_FAILED)
                ->done();
        }

        return $this->buildDataResult($response->object())->done();
    }

    private const BASEURL = 'https://api.openbrewerydb.org/';
}
