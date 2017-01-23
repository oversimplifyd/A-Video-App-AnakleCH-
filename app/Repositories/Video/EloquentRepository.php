<?php

namespace Acada\Repositories\Video;

use Acada\Repositories\Video\RepositoryInterface;

use Acada\Video;

class EloquentRepository implements RepositoryInterface {

    public function all()
    {
        return Video::all();
    }
    public function find($id)
    {
        return Video::find($id);
    }
    public function create($input)
    {
        return Video::create($input);
    }

    public function where($search, $value, $paginate = null)
    {
        if ($paginate)
            return Video::where($search, $value)->simplePaginate($paginate);
        return Video::where($search, $value);
    }

    public function simplePaginate($count)
    {
        return Video::simplePaginate($count);
    }

}