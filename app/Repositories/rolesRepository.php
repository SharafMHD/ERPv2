<?php

namespace App\Repositories;

use App\Models\roles;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class rolesRepository
 * @package App\Repositories
 * @version October 23, 2018, 2:20 pm UTC
 *
 * @method roles findWithoutFail($id, $columns = ['*'])
 * @method roles find($id, $columns = ['*'])
 * @method roles first($columns = ['*'])
*/
class rolesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'role_name',
        'created_by'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return roles::class;
    }
}
