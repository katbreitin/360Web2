<?php

namespace ApiReddit;

require_once './vendor/autoload.php';

class Searcher
{

    /**
     * This method queries the reddit API for searches
     *
     * @param $subreddit The subreddit to search
     * @param $query The term to search for
     * @param $options The filter used to search
     * @param $results The number of results to return
     *
     **/
    public function execSearch($subreddit = 'php', $query, $options, $results = 10)
    {                   
        //Executes an http request using guzzle
        $client = new \GuzzleHttp\Client([
            'headers' => ['User-Agent' => 'testing/1.0'],
            'verify' => false]);

        $response = $client->request("GET", 'https://reddit.com/r/' . $subreddit . '/search.json', ['query' => 'q=' . $query . '&sort=' . $options . '&restrict_sr=1&limit=' . $results ]);

        $body = $response->getBody(true);

        return $body;
    }
}