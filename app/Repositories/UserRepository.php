<?php 

namespace App\Repositories;

use App\Repositories\BaseRepository;
use Exception;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use DB;

class UserRepository extends BaseRepository implements UserRepositoryInterface {

    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function create($data) {
        $this->model->create($data);
    }
}