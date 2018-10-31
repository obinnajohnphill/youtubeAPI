<?php
/**
 * Created by PhpStorm.
 * User: obinnajohnphill
 * Date: 29/10/18
 * Time: 10:34
 */

namespace App\Http\Controllers;

use Alaouy\Youtube\Facades\Youtube;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;



class SearchVideosController  extends Controller
{
    public $data;

    public function index()
    {

        $searchItem = Input::post('searchItem') ;
        $num_of_video = Input::post('num_of_video');

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

        ## sort the YouTube Videos ready for the laravel blade
        foreach ($search['results'] as $result){

           $video  = $result->id->videoId;
           $title  = $result->snippet->title;

           $this->data = $title;

            $results[] = [
                'video'    => $video,
                'title' => $title,
            ];

        }

        return view('videos.show', compact('results'));


    }

    public function passData(){
        return $this->data;
    }

}