<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getModel(): Model
    {
        return $this->model;
    }

    public function getNewInstance()
    {
        return $this->model->newInstance();
    }

    function getTable(): string
    {
        return $this->model->getTable();
    }

    public function all($columns = ['*'])
    {
        return $this->model->all($columns);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * @return Model
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * @return Model
     */
    public function update($id, array $data)
    {
        $model = $this->find($id);

        if ($model) {
            $model->update($data);
            return $model;
        }

        return null;
    }

    public function delete($id)
    {
        $model = $this->find($id);

        if ($model) {
            $model->delete();
            return true;
        }

        return false;
    }

    /** Custom Methods */


    /**
     * Get PerPage from Model
     * 
     * @return int
     */
    public function getPerPage()
    {
        return $this->model->getPerPage();
    }

    /**
     * Make some
     * 
     * @param int $count
     */
    function makeModels(int $count)
    {
        return $this->model->factory()->count($count)->make();
    }

    /**
     * @param array $params
     *
     * @return Model
     */
    public function makeOneModel(array $params = [])
    {
        return $this->model->factory()->make($params);
    }

    /**
     * Create some Models.
     * 
     * @param int $count
     */
    function createModels(int $count)
    {
        return $this->model->factory()->count($count)->create();
    }

    /**
     * @param array $params
     *
     * @return Model
     */
    public function createOneModel(array $params = [])
    {
        return $this->model->factory()->create($params);
    }
}
