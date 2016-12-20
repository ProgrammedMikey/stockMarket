<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \stdClass;
use Illuminate\Contracts\Routing\ResponseFactory;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class HomeController extends Controller
{

    public function index()
    {
        return view('welcome');
    }

    public function getStockData( Request $request) {

//        $params = new stdClass;
//        $params->Normalized = false;
//        $params->NumberOfDays = 3650;
//        $params->DataPeriod = "Day";
//        $params->Elements = array();
//        $params->Elements[0] = array("Symbol" => "AAPL",
//            "Type" => "price",
//            "Params"=>Array("ohlc"));
        $symbol = $request->input('symbolsearch', 'GOOG');
        $params = [
            'Normalized' => false,
            'NumberOfDays' => 3650,
            'DataPeriod' => 'Day',
            'Elements' => [
                [
                    'Symbol' => $symbol,
                    'Type' => 'price',
                    'Params' => [
                        'ohlc',
                    ],
                ],
            ],
        ];

        $url = 'http://dev.markitondemand.com/MODApis/Api/v2/InteractiveChart/json?parameters=' . json_encode($params);

        $guzzle = new Client();

            $response = json_decode($guzzle->request('GET', $url)->getbody());
            return ['response' => $response];

//        dd($url);

//        $myTest = "AAPL";
//        $url = 'http://dev.markitondemand.com/api/v2/Lookup/json?input=' . $myTest;
//        dd($url);
    }
    public function getLookUp(Request $request)
    {
        $symbol = $request->input('symbolsearch', "GOOG");
        $url = 'http://dev.markitondemand.com/api/v2/Lookup/json?input=' . $symbol;

        $guzzle = new Client();

        $response = json_decode($guzzle->request('GET', $url)->getbody());
        return ['response' => $response];
//        dd($response);
    }

}
