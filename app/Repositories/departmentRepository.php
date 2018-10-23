<?php

namespace App\Repositories;

use App\Models\department;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class departmentRepository
 * @package App\Repositories
 * @version October 23, 2018, 10:56 am UTC
 *
 * @method department findWithoutFail($id, $columns = ['*'])
 * @method department find($id, $columns = ['*'])
 * @method department first($columns = ['*'])
*/
class departmentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return department::class;
    }
}
