<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\items;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class itemsRepository
 * @package App\Repositories\Inventory
 * @version December 3, 2018, 10:40 am UTC
 *
 * @method items findWithoutFail($id, $columns = ['*'])
 * @method items find($id, $columns = ['*'])
 * @method items first($columns = ['*'])
*/
class itemsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'no',
        'name',
        'category_id',
        'unit_id',
        'sales_price',
        'purchase_price',
        'low_stock_qty',
        'color',
        'size',
        'description',
        'item_type'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return items::class;
    }
}
