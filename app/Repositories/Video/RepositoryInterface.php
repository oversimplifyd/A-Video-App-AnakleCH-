<?php

namespace Acada\Repositories\Video;

interface RepositoryInterface {
    public function all();
    public function find($id);
    public function create($input);
    public function where($search, $value);
    public function simplePaginate($count);
}
