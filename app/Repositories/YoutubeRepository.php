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

    public $cannotSave;


    // Get all instances of model
    public function all()
    {
        $data = YoutubeVideosModel::all();

        foreach ($data as $videos) {
            return $videos;
        }
    }


    public function insertVideo($data)
    {

        foreach ($data as $result) {
            $video = new YoutubeVideosModel;
            $exist = YoutubeVideosModel::where('video_id', $result->id->videoId)->first();
            if (!$exist) {
                $video->video_id = $result->id->videoId;
                $video->title = $result->snippet->title;
                $video->save();
            } else {
                $this->cannotSave = true;
                return $this->cannotSave;
            }
        }

    }

}