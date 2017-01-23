<?php

namespace Acada\Repositories\Users;

use Acada\User;

class EloquentRepository implements RepositoryInterface {

    public function all()
    {
        return User::all();
    }
    public function find($id)
    {
        return User::find($id);
    }
    public function create($input)
    {
        return User::create($input);
    }

    public function where($search, $value)
    {
        return User::where($search, $value);
    }

}