<?php

namespace App\Repositories;

use App\Models\hr_department;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class hr_departmentRepository
 * @package App\Repositories
 * @version October 17, 2018, 2:54 pm UTC
 *
 * @method hr_department findWithoutFail($id, $columns = ['*'])
 * @method hr_department find($id, $columns = ['*'])
 * @method hr_department first($columns = ['*'])
*/
class hr_departmentRepository extends BaseRepository
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
        return hr_department::class;
    }
}
