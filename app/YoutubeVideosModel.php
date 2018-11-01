<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YoutubeVideosModel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'video_id', 'title',
    ];


    /**
     * The table associated with the model.
     *
     * @var string
     */
     protected $table = 'youtube_videos';

}
