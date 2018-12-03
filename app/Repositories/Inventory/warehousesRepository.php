<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\warehouses;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class warehousesRepository
 * @package App\Repositories\Inventory
 * @version November 29, 2018, 5:11 pm UTC
 *
 * @method warehouses findWithoutFail($id, $columns = ['*'])
 * @method warehouses find($id, $columns = ['*'])
 * @method warehouses first($columns = ['*'])
*/
class warehousesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'keeper',
        'location',
        'phone',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return warehouses::class;
    }
}
