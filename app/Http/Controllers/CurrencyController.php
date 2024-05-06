<?php

namespace App\Http\Controllers;

use App\Domain\Currency\Entities\Currency;
use App\Domain\Weather\Services\AccuWeatherService;
use App\Domain\Weather\Services\CurrencyService;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{   
    public $currencyService;

    public function __construct(CurrencyService $currencyService)
    {
        $this->currencyService = $currencyService;
    }



    public function inedx(Request $request){
        $response = $this->currencyService->getCurrencies($request);

        return $this->apiResponse(
            [
                'success' => true,
                'result' => $response->json(),
                'message'=>'Success'
            ], 200
        );
    }

    public function show(Currency $currency){
        return $this->apiResponse(
            [
                'success' => true,
                'result' => $currency,
                'message'=>'Success'
            ], 200
        );
    }
}
