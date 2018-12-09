<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\StockDetails;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class StockDetailsRepository
 * @package App\Repositories\Inventory
 * @version December 4, 2018, 9:19 am UTC
 *
 * @method StockDetails findWithoutFail($id, $columns = ['*'])
 * @method StockDetails find($id, $columns = ['*'])
 * @method StockDetails first($columns = ['*'])
*/
class StockDetailsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'warehouse_id',
        'item_id',
        'qty',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return StockDetails::class;
    }
}
