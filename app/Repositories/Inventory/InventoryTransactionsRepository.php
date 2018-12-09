<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory\InventoryTransactions;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class InventoryTransactionsRepository
 * @package App\Repositories\Inventory
 * @version December 4, 2018, 2:05 pm UTC
 *
 * @method InventoryTransactions findWithoutFail($id, $columns = ['*'])
 * @method InventoryTransactions find($id, $columns = ['*'])
 * @method InventoryTransactions first($columns = ['*'])
*/
class InventoryTransactionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'date',
        'no',
        'warehouse_id',
        'item_id',
        'transaction_type',
        'qty',
        'price',
        'description',
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return InventoryTransactions::class;
    }
}
