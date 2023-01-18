<?php


namespace MG\User\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use MG\User\User;

class UserService
{
    public function model(): Model
    {
        return new User();
    }

    public function list(): Collection
    {
        return $this->model()->all(); // we should use paginate or cursor for better performance
    }

    public function store($data): Model
    {
        return $this->model()->create($data);
    }

    public function update($id, $data): Model
    {
        return tap($this->show($id))->update($data);
    }

    public function show($id)
    {
        return $this->model()->findOrFail($id);
    }

    public function destroy($id)
    {
        return $this->show($id)->delete();
    }
}