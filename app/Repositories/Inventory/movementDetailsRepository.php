<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\movementDetails;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class movementDetailsRepository
 * @package App\Repositories\Inventory
 * @version December 4, 2018, 2:20 pm UTC
 *
 * @method movementDetails findWithoutFail($id, $columns = ['*'])
 * @method movementDetails find($id, $columns = ['*'])
 * @method movementDetails first($columns = ['*'])
*/
class movementDetailsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'item_id',
        'qty',
        'notes',
        'movement_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return movementDetails::class;
    }
}
