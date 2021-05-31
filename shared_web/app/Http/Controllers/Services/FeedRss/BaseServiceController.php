<?php

namespace App\Http\Controllers\Services\FeedRss;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DOMDocument;

class BaseServiceController extends Controller
{
    /**@var string */
    private $feed_url;

    /**
     * #######################
     * ####   CONSTRUCT   ####
     * #######################
     */
    public function __construct() {
        $this->feed_url = env('FEED_URL');    
    }
    protected function feedRss()
    {

        $rss = simplexml_load_file($this->feed_url);
        $limit = 1;
        $count = 0;

        if($rss){
            foreach ( $rss->channel->item as $item ){

                // var_dump($item->link,$item->title);
                $data = [
                    "link" => $item->link,
                    "title" => $item->title
                ];
                return $data;
                
                $count++;
                if($count == $limit){
                    break;
                } 
            }
        }
        else{
        echo 'Erro ao processar os dados.';
        }
    }
}