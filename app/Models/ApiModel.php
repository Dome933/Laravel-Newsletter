<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Handlers\ApiHandler;
use Illuminate\Http\Client\Response;

class ApiModel extends Model
{
    use HasFactory;

    const GET_POSTS_ENDPOINT = 'endpoint';

    public function getPosts($dateFrom)
    {
        $apiHandler = new ApiHandler();
        $endpoint = $this->getPostsEndpoint();
        $params = $this->getPostsParams($dateFrom);

        $allResults = [];

        $page = 0;

        do {
            $page++;
            $params['page'] = $page;
            $response = $apiHandler->sendGetRequest($endpoint, $params);
            $results = $response['clips'];
        
            $allResults = array_merge($allResults, $results);
        } while ($page !== $response['totalPages']);

        return $allResults;
    }

    private function getPostsEndpoint() : string
    {
        return 'api/v' . env('API_VERSION') . '/Clips/' . ApiModel::GET_POSTS_ENDPOINT;
    }

    private function getPostsParams($dateFrom) : array
    {
        return [
            "dateFrom" => $dateFrom,
            "clientID" => env('API_CLIENT_ID'),
            "pageSize" => 100,
            "page" => 1,
        ];
    }
}
