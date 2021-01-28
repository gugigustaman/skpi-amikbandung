<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\RepositoryInterface;

class Repository implements RepositoryInterface
{
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    // METHOD ALL / PUBLIC

    public function all()
    {
        return $this->model->all();
    }

    public function paginate($count)
    {
        return $this->model->paginate($count);
    }

    // create a new record in the database
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    // update record in the database
    public function update(array $data, $id)
    {
        $record = $this->model->findorfail($id);
        return $record->update($data);
    }

    // remove record from the database
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    // show the record with the given id
    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    public function showwith($id, $with)
    {
        return $this->model->with($with)->findOrFail($id);
    }

    // Get the associated model
    public function getModel()
    {
        return $this->model;
    }

    // Set the associated model
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    // Eager load database relationships
    public function with($relations)
    {
        return $this->model->with($relations)->get();
    }


    // where Gallery
    public function wherealbum($id)
    {
        return $this->model->where('album_id', $id)->get();
    }

    //where Catalog
    public function wherecatalog($id)
    {
        return $this->model->where('categories_id', $id)->paginate(20);
    }

    //detailWith
    public function detailwith($id, $with)
    {
        return $this->model->with($with)->find($id);
    }

    //wherelink
    public function wherelink($id)
    {
        return $this->model->where('category_id', $id)->paginate(20);
    }

    public function wherepaginate($where, $parameter, $count)
    {
        return $this->model->where($where, $parameter)->paginate($count);
    }


    public function wherepaginaterequest(
        $where,
        $parameter,
        $count,
        $search,
        $request
    ) {
        if ($request->q) {
            return $this->model->where($where, $parameter)
                ->where($search, 'like', '%' . $request->q . '%')->paginate($count);
        } else {
            return $this->model->where($where, $parameter)->paginate($count);
        }
    }
}
