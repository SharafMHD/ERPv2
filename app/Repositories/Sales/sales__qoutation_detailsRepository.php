<?php

namespace App\Repositories\Sales;

use App\Models\Sales\sales__qoutation_details;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class sales__qoutation_detailsRepository
 * @package App\Repositories\Sales
 * @version December 30, 2018, 5:10 pm UTC
 *
 * @method sales__qoutation_details findWithoutFail($id, $columns = ['*'])
 * @method sales__qoutation_details find($id, $columns = ['*'])
 * @method sales__qoutation_details first($columns = ['*'])
*/
class sales__qoutation_detailsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'item_id',
        'qty',
        'price',
        'total',
        'description',
        'qoutation_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return sales__qoutation_details::class;
    }
}
