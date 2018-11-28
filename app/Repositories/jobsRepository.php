<?php

namespace App\Repositories;

use App\Models\jobs;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class jobsRepository
 * @package App\Repositories
 * @version October 30, 2018, 7:20 am UTC
 *
 * @method jobs findWithoutFail($id, $columns = ['*'])
 * @method jobs find($id, $columns = ['*'])
 * @method jobs first($columns = ['*'])
*/
class jobsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'name',
        'description',
        'departmentID'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return jobs::class;
    }
}
