<?php

namespace App\Http\Controllers\API\Zapito;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class BaseServiceController extends Controller
{
    /**@var string */
    private $api_url;

    /**@var string */
    private $api_key;
    /**
     * #######################
     * ####   CONSTRUCT   ####
     * #######################
     */
    function __construct() {
        $this->api_url = env('API_URL_ZAPITO');    
        $this->api_key = env('API_KEY_ZAPITO');    
    }
    /**
     * #######################
     * ####    ATTEMPT    ####
     * #######################
     * 
     */
    private function attempt()
    {
        return Http::withToken($this->api_key);
    }
    /**
     * #########################
     * ####   CURL :: GET   ####
     * #########################
     */
    protected function get($endpoint)
    {
        $response = $this->attempt()->get($this->getUrl($endpoint))->json();

        if (!empty($response)) {
           return $response;
        }else{
            return "Dado não encontrado, ou não existe :/";
        }
    }
    /**
     * ##########################
     * ####   CURL :: POST   ####
     * ##########################
     */
    protected function post($endpoint, $data)
    {
        $response = $this->attempt()->post($this->getUrl($endpoint), $data)->json();
        if ($response["data"][0]["error"] == false) {
            return $response;
        }
    }

    /**
     * #########################
     * ####     URL API     ####
     * #########################
     */
    private function getUrl($endpoint)
    {
        return $this->api_url . $endpoint;
    }
}
