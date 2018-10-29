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

    public function index()
    {

        $searchItem = Input::post('searchItem') ;

        $params = [
            'q' => $searchItem,
            'type' => 'video',
            'part' => 'id, snippet',
            'maxResults' => 50
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

        foreach ($search['results'] as $result){

          return view('videos.show')->with('data', ['video' => $result->id->videoId, 'decription' => $result->snippet->title]);

        }




       // $vi = "jej34hDRGWg";
       // $desc = "Hello World";

       // return view('videos.show')->with('data',$data);
       // return view('videos.show')->with('data', ['video' => $vi, 'decription' => $desc]);

    }

}