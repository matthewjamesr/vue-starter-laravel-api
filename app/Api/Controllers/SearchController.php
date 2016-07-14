<?php

namespace Api\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Api\Requests\SearchRequest;
use Mbarwick83\TwitterApi\TwitterApi;

/**
 * @Resource('Dogs', uri='/dogs')
 */
class SearchController extends BaseController
{

    public function __construct(TwitterApi $twitter) 
    {
        //$this->middleware('jwt.auth');
        $this->twitter = $twitter;
    }

    /**
     * Show all dogs
     *
     * Get a JSON representation of all the dogs
     * 
     * @Get('/')
     */
    public function index()
    {
        $query = $this->twitter->get("search/tweets", ["q" => "protest", "geocode" => "38.6532137,-90.3135015,10mi", "result_type" => "recent"]);
        return json_encode($query);
    }

}
