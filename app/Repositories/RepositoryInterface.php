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

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function show($id);
}