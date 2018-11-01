<?php
/**
 * Created by PhpStorm.
 * User: obinnajohnphill
 * Date: 31/10/18
 * Time: 15:56
 */

namespace App\Repositories;


interface RepositoryInterface
{
    public function all();

    public function insertVideo($video_id, $title);
}

