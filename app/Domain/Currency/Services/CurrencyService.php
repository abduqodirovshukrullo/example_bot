<?php
namespace App\Domain\Currency\Services;

use App\Domain\Currency\Clients\CbrClient;
use App\Domain\Currency\Entities\Currency;
use App\Domain\Weather\Entities\Location;
use App\Domain\Weather\Entities\OpenWeatherMap;
use App\Utils\CurrencyXmlParser;

class CurrencyService
{
    public $currency;
    public $client;
    function __construct(){
        $this->client = new CbrClient();
    }
    public function getCurrencies($payload){
        $currencies = Currency::query()->get();
        return $currencies;
    }

    public function loadCurrency(){
        $data = $this->client->getCurrencies();
        $currencyDataArray = new CurrencyXmlParser($data->body());
        return $currencyDataArray->toArray();
    }   

}

