<?php

namespace App\Http\Controllers\Services\FeedRss;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeedRssController extends BaseServiceController
{
    /**
     * ###############
     * #### FEEDS ####
     * ###############
     */
    public function getFeeds()
    {
        return $this->feedRss();
    }
}
