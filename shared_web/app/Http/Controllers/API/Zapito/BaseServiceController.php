<?php

namespace App\Http\Controllers\API\Zapito;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Http\Controllers\Services\FeedRss\FeedRssController as Feed;


use Illuminate\Support\Facades\Http;

class BaseServiceController extends Controller
{
    /**@var string */
    private $api_url;
    /**@var string */
    private $api_key;

    public function __construct()
    {
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
    protected function post($endpoint, $recipients)
    {
        /**
         * FEED de Notícias :: Update a cada 1 minuto
         */
        $feed_data = new Feed();
        $feed = $feed_data->getFeeds();
        $notice = $feed["title"];
        $link = $feed["link"];

        foreach ($recipients as $recipient) {
            /**
             * SOMENTE ENVIA SE USER RECIPIENT TIVER STATUS TRUE
             */
            if ($recipient->active == 1) {
                /**
                 * ########################################
                 * ####   Msg de Teste da Plataforma   ####
                 * ########################################
                 */
                $data =  [
                    "data" => [
                        [
                            "phone" => $recipient->phone_number,
                            "message" => "
                                Zapito API:: Notícias do Brasil e do Mundo! \n\n \n Olá $recipient->first_name !\n\n Informe do dia:\n\n $notice \n\n Acesse: $link \n\n\n By: Raphael Moraes
                            ",
                            "test_mode" => true
                        ]
                    ]
                ];
                /**
                 *##################################################################################
                * $data["data"][0]["error"] = false :: Informa que a msg foi efetuada com sucesso
                * ##################################################################################
                */
                // print_r($data);
                $this->attempt()->post($this->getUrl($endpoint), $data)->json();
                // var_dump($response);
            }
        }
       
        
        // if ($response["data"][0]["error"] == false) {
        //     return $response;
        // }
    }

    /**
     * #########################
     * ####     URL API     ####
     * #########################
     */
    protected function getUrl($endpoint)
    {
        return $this->api_url . $endpoint;
    }
}
