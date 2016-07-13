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
        $place = $this->twitter->get("geo/reverse_geocode", ["lat" => "-122.41893768310548", "long" => "37.77397129533325", "granularity" => "city"]);
        //$query = $this->twitter->get("search/tweets", ["q" => "protest", "result_type" => "recent"]);
        return json_encode($place);
    }

}
