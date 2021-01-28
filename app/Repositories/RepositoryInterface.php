<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function all();

    public function paginate($count);

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function show($id);

    public function showwith($id, $with);

    public function wherealbum($id);

    public function wherecatalog($id);

    public function detailwith($id, $with);

    public function wherelink($id);

    public function wherepaginate($where, $parameter, $count);

    public function wherepaginaterequest($where, $parameter, $count, $search, $request);
}
