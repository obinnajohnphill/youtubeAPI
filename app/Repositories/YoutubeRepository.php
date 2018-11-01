<?php
/**
 * Created by PhpStorm.
 * User: obinnajohnphill
 * Date: 31/10/18
 * Time: 15:54
 */

namespace App\Repositories;
use App\YoutubeVideosModel;

class YoutubeRepository implements RepositoryInterface
{


    // Get all instances of model
    public function all()
    {
        $data = YoutubeVideosModel::all();

        foreach ($data as $videos) {
            return $videos;
        }
    }


    public function insertVideo($data){

        foreach ($data as $result){
            $video = new YoutubeVideosModel;
            $video->video_id = $result->id->videoId;
            $video->title = $result->snippet->title;
            //$video->save();
        }

    }



}