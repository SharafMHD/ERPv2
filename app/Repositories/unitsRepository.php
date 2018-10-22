<?php

namespace App\Repositories;

use App\Models\units;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class unitsRepository
 * @package App\Repositories
 * @version October 22, 2018, 1:31 pm UTC
 *
 * @method units findWithoutFail($id, $columns = ['*'])
 * @method units find($id, $columns = ['*'])
 * @method units first($columns = ['*'])
*/
class unitsRepository extends BaseRepository
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
        return units::class;
    }
}
