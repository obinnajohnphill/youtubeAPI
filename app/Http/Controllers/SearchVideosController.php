<?php
/**
 * Created by PhpStorm.
 * User: obinnajohnphill
 * Date: 29/10/18
 * Time: 10:34
 */

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Input;
use App\Services\YoutubeService;
use App\Repositories\YoutubeRepository;



class SearchVideosController  extends Controller
{
    public $data;

    public function index()
    {

        $searchItem = Input::post('searchItem') ;
        $num_of_video = Input::post('num_of_video');

        
        $data = new YoutubeService();
        $search = $data->youtubeData ($searchItem,$num_of_video);

        ## sort the YouTube Videos ready for the laravel blade
        foreach ($search as $result){

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