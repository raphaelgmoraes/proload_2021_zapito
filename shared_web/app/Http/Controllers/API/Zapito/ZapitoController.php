<?php

namespace App\Http\Controllers\API\Zapito;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Http\Controllers\Services\FeedRss\FeedRssController as Feed;
use \App\Models\Recipients;


class ZapitoController extends BaseServiceController
{
    
    /**
     * ##############
     * #### BOTS ####
     * ##############
     */
    public function getBots()
    {
        $endpoint = "bots/";
        return $this->get($endpoint);
    }
    public function getBotId($id)
    {
        if(is_numeric($id)){
            $endpoint = "bots/{$id}";
            return $this->get($endpoint);
        }
        else{
            return "dados incorretos, verifique e tente novamente!";
        }
    }

    /**
     * #################
     * #### MESSAGE ####
     * #################
     */
    public function getMessages($id)
    {
        
        if (is_numeric($id)) {
            
            $endpoint = "messages/{$id}";
            return $this->get($endpoint);
        }
    }

    /**
     * ######################################################
     * Send Message :: Test API Zapito
     * $data = recebe os dados de teste para execução
     * url: http://134.122.38.186:8080/api/massive = executa
     * ######################################################
     */
    public function sendMessages()
    {
        $random_number = mt_rand(100, 200);
        $endpoint = "messages";
        
        /**
         * FEED de Notícias :: Update a cada 1 minuto
         */
        $feed_data = new Feed();
        $feed = $feed_data->getFeeds();

        $notice = $feed["title"];
        $link = $feed["link"];
        /**
         * ###########################################
         * ####   GET data User Recipient Model   ####
         * ###########################################
         */        
        $recipients = Recipients::all();
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
                return $this->post($endpoint, $data);
            }
        }
    }

    /**
     * ##################################################################################
     * Função executa o envio via http com o metodo GET em Route
     * Route::get('/api/massive', [ZapitoController::class, 'massive']);
     * ##################################################################################
     */
    public function massive()
    {   
        $this->sendMessages();
        
        
    }










































    // public function sendMessages()
    // {
    //     $endpoint = "/api/messages";
        
    //     /**
    //      * $data["data"][0] = Mensagem de Teste
    //      * $data["data"][1] = Mensagem Oficial 
    //      */
    //     $data = [
    //         "test_mode" => true,
    //         "data" => [
    //             [
    //                 "phone" => "11900000000",
    //                 "message" => "Mensagem de teste 1",
    //                 "test_mode" => true
    //             ]
    //         ]
    //     ];
    //     // echo "<pre>";
    //     // var_dump($data["data"][0]);
    //     // echo "</pre>";
       


    //     // $data = [
    //     //     "test_mode" => true,
    //     //     "data" => [
    //     //         [
    //     //             "phone" => "21996514273",
    //     //             "message" => "Mensagem de teste 1",
    //     //             "test_mode" => true
    //     //         ],
    //     //         [
    //     //             "phone" => "5521996514273",
    //     //             "message" => "Olá mundo! API Zapito",
    //     //             "bot_id" => 9719,
    //     //             "file" => [
    //     //                 "url" => "https://via.placeholder.com/400",
    //     //                 "name" => "arquivo_exemplo.png",
    //     //                 "headers" => [
    //     //                     "X-Custom-Header" => "valor_custom_header"
    //     //                 ],
    //     //                 "optional" => false
    //     //             ],
    //     //             "meta" => "Opcional - Não utilizado pelo Zapito"
    //     //         ]
    //     //     ]
    //     // ];
    //     // echo "<pre>";
    //     // var_dump($data["data"][1]);
    //     // echo "</pre>";

    //     return $this->post($endpoint);
        
    // }
    

}
