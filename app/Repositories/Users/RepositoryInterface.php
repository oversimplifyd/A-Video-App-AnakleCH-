<?php

namespace Acada\Repositories\Users;

interface RepositoryInterface {
    public function all();
    public function find($id);
    public function create($input);
    public function where($search, $value);
}
