<?php
/**
 * Created by PhpStorm.
 * User: obinnajohnphill
 * Date: 31/10/18
 * Time: 16:00
 */

namespace App\Services;

use Alaouy\Youtube\Facades\Youtube;

class YoutubeService
{
    public function youtubeData ($searchItem,$num_of_video){

        $params = [
            'q' => $searchItem,
            'type' => 'video',
            'part' => 'id, snippet',
            'maxResults' => $num_of_video
        ];


        // An array to store page tokens so we can go back and forth
        $pageTokens = [];

        // Make inital search
        $search = Youtube::paginateResults($params, null);

        // Store token
        $pageTokens[] = $search['info']['nextPageToken'];

        // Go to next page in result
        $search = Youtube::paginateResults($params, $pageTokens[0]);

        // Store token
        $pageTokens[] = $search['info']['nextPageToken'];

        // Go to next page in result
        $search = Youtube::paginateResults($params, $pageTokens[1]);

        // Store token
        $pageTokens[] = $search['info']['nextPageToken'];

        // Go back a page
        $search = Youtube::paginateResults($params, $pageTokens[0]);

        // Add results key with info parameter set
        // print_r($search['results']);

        return $search['results'];

    }

}