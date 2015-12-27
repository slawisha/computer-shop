<?php namespace App\Repositories;


use App\User;

class UserRepository {

    /**
     * find all users that are members
     *
     * @return mixed
     */
    public function all()
    {
        return User::where('role_id',2)->paginate(10);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return User::findOrFail($id);
    }
}