<?php

namespace App\Http\Controllers;

use App\Services\AbstractModelService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\ArrayShape;

abstract class AbstractApiController extends Controller
{
    protected string $modelClass;

    protected int $perPage = 15;

    protected string $requestUpdateClass;

    protected string $requestStoreClass;

    protected function createInstance(): Model
    {
        return (new $this->modelClass);
    }

    protected function find(int|string $id): Model
    {
        return $this->createInstance()::query()->findOrFail($id);
    }

    protected function validated(Request $request): array
    {
        if ($request instanceof FormRequest) {
            $attributes = $request->validated();
        } else {
            $attributes = $request->all();
        }
        return $attributes;
    }

    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index(): array
    {
        return $this->createInstance()::query()->paginate($this->perPage)->items();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Model
     */
    public function store(Request $request): Model
    {
        $request = app($this->requestStoreClass ?? Request::class);
        $attributes = $this->validated($request);
        $model = $this->createInstance()->fill($attributes);
        $model->save();
        return $model;
    }

    /**
     * Display the specified resource.
     *
     * @param string|int $id
     * @return Model
     */
    public function show(string|int $id): Model
    {
        return $this->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int|string $id
     * @return Model
     */
    public function update(int|string $id): Model
    {
        $request = app($this->requestUpdateClass ?? Request::class);
        $attributes = $this->validated($request);
        $model = $this->find($id)->fill($attributes);
        $model->save();
        return $model;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int|string $id
     * @return array
     */
    #[ArrayShape(['id' => "int|string"])]
    public function destroy(int|string $id): array
    {
        $this->find($id)->delete();
        return ['id' => $id];
    }
}
