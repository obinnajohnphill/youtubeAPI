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
            //echo $videos->name;

            return $videos;
        }
    }


    public function insertVideo($video_id,$title){
        $video = new YoutubeVideosModel;
        $video->video_id = $video_id;
        $video->video_title = $title;
        $video->save();
    }



}