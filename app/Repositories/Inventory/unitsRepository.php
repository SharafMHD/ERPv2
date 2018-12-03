<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\units;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class unitsRepository
 * @package App\Repositories\Inventory
 * @version December 2, 2018, 3:09 pm UTC
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
