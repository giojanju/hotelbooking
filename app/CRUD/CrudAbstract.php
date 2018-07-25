<?php

namespace App\CRUD;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

abstract class CrudAbstract extends Controller
{
    public function json()
    {
        $object = $this->conf('model.name')::all();
        
        if (null !== $this->conf('model.relations') && count($this->conf('model.relations'))) {
            $object = $this->conf('model.name')::with($this->conf('model.relations'))->get();
        }
        
        return [
            'succes' => true,
            'data'   => $object,
        ];
    }

    public function create(Request $request)
    {
        $data = $request->all();

        $request->validate($this->conf('model.rules'));

        $object = $this->conf('model.name')::create($data);

        // Many to many relation
        if (null !== $this->conf('model.pusher') && count($this->conf('model.pusher'))) {
            foreach ($this->conf('model.pusher') as $relation) {
                $object->$relation()->sync($data[$relation]);
            }
        }

        // attach media
        if (null !== $this->conf('media') && count($this->conf('media'))) {
            if ($request->has($this->conf('media.field'))) {
                $this->object->addMedia($this->conf('media.field'))
                    ->toMediaCollection($this->conf('media.collection'));
            }
        }

        return [
            'success' => true,
            'data'    => $object,
        ];
    }

    public function single($id)
    {
        $object = $this->conf('model.name')::findOrFail($id);

        if (null !== $this->conf('model.relations') && count($this->conf('model.relations'))) {
            $object = $this->conf('model.name')::with($this->conf('model.relations'))->findOrFail($id);
        }

        return [
            'success' => true,
            'data' => $object,
        ];
    }

    public function update($id, Request $request)
    {
        $data = $request->all();

        $model = $this->conf('model.name')::findOrFail($id);

        $request->validate($this->conf('model.rules'));

        // Many to many relation
        if (null !== $this->conf('model.pusher') && count($this->conf('model.pusher'))) {
            foreach ($this->conf('model.pusher') as $relation) {
                $model->$relation()->sync($data[$relation]);
            }
        }

        // attach media
        if (null !== $this->conf('media') && count($this->conf('media'))) {
            if ($request->has($this->conf('media.field'))) {
                $this->model->clearMediaCollection($this->conf('media.collection'))
                    ->addMedia($this->conf('media.field'))
                    ->toMediaCollection($this->conf('media.collection'));
            }
        }

        $object = $model->fill($data);
        $object->save();

        return [
            'success' => true,
            'data' => $object,
        ];
    }

    public function delete($id)
    {
        $object = $this->conf('model.name')::findOrFail($id);
        $object->delete();

        return [
            'success' => true,
            'data' => $object,
        ];
    }

    /**
    * getting info mianc config
    * @param string
    */
    protected function conf($key)
    {
        return array_get($this->config, $key);
    }
}
