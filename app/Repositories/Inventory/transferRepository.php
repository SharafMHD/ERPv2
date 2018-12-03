<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\transfer;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class transferRepository
 * @package App\Repositories\Inventory
 * @version December 3, 2018, 1:03 pm UTC
 *
 * @method transfer findWithoutFail($id, $columns = ['*'])
 * @method transfer find($id, $columns = ['*'])
 * @method transfer first($columns = ['*'])
*/
class transferRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'no',
        'date',
        'from_warehouse_id',
        'to_warehouse_id',
        'notes',
        'status',
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return transfer::class;
    }
}
