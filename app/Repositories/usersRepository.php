<?php

namespace App\Repositories;

use App\Models\users;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class usersRepository
 * @package App\Repositories
 * @version October 23, 2018, 2:39 pm UTC
 *
 * @method users findWithoutFail($id, $columns = ['*'])
 * @method users find($id, $columns = ['*'])
 * @method users first($columns = ['*'])
*/
class usersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'user_name',
        'role',
        'password',
        'user_group',
        'image',
        'status',
        'remember_token',
        'email'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return users::class;
    }
}
