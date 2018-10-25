<?php

namespace App\Repositories;

use App\Models\privileges;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class privilegesRepository
 * @package App\Repositories
 * @version October 25, 2018, 11:43 am UTC
 *
 * @method privileges findWithoutFail($id, $columns = ['*'])
 * @method privileges find($id, $columns = ['*'])
 * @method privileges first($columns = ['*'])
*/
class privilegesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'role',
        'action',
        'model'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return privileges::class;
    }
}
