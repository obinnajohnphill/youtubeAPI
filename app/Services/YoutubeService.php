<?php
/**
 * Created by PhpStorm.
 * User: obinnajohnphill
 * Date: 31/10/18
 * Time: 16:00
 */

namespace App\Services;

use Alaouy\Youtube\Facades\Youtube;
use App\Repositories\YoutubeRepository;


class YoutubeService
{
    public function youtubeData ($searchItem,$num_of_video,$save_video)
    {

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

        ## Determine whether to save video into DB or not
        if ($save_video == NULL) {
            return $search['results'];
        }
        else {
            $save = new YoutubeRepository();
            $duplicate = $save->insertVideo($search['results']);
            if ($duplicate == true){
                $search['results'] = array($search['results'],"duplicate");
                return $search['results'];
            }else{
                $save->insertVideo($search['results']);
                $search['results'] = array($search['results'], "yes");
                return $search['results'];
            }
        }

    }

    public function viewAll($view){
        $results = array();
        ## Process all videos from database ready to pass to the controller then into the viewall blade
        if ($view != NULL){
            $view = new YoutubeRepository();
            $getAll = $view->all();
            foreach ($getAll as $vid){
                $results[] = [
                    'video'    => $vid->getAttributes()['video_id'],
                    'title' => $vid->getAttributes()['title'],
                ];

            }
            return $results;
        }

    }


}